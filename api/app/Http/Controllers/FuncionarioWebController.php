<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class FuncionarioWebController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::with('user')
            ->orderBy('nome')
            ->get();

        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('funcionarios.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:150'],
            'cpf' => ['required', 'digits:11', 'unique:funcionarios,cpf'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
            'role' => ['required', Rule::in(['admin', 'funcionario'])],
        ]);

        DB::transaction(function () use ($dados) {

            $user = User::create([
                'name' => $dados['nome'],
                'email' => $dados['email'],
                'password' => Hash::make($dados['password']),
                'role' => $dados['role'],
            ]);

            Funcionario::create([
                'user_id' => $user->id,
                'cpf' => $dados['cpf'],
                'nome' => $dados['nome'],
                'ativo' => true,
            ]);
        });

        return redirect()
            ->route('funcionarios.index')
            ->with('sucesso', 'Voluntário cadastrado com sucesso.');
    }

    public function edit(Funcionario $funcionario)
    {
        $funcionario->load('user');

        return view('funcionarios.edit', compact('funcionario'));
    }

    public function update(Request $request, Funcionario $funcionario)
    {
        $funcionario->load('user');

        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:150'],

            'cpf' => [
                'required',
                'digits:11',
                Rule::unique('funcionarios', 'cpf')
                    ->ignore($funcionario->id),
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
                    ->ignore($funcionario->user?->id),
            ],

            'password' => [
                'nullable',
                'confirmed',
                'min:6',
            ],

            'role' => [
                'required',
                Rule::in(['admin', 'funcionario']),
            ],

            'ativo' => [
                'nullable',
                'boolean',
            ],
        ]);

        DB::transaction(function () use ($dados, $funcionario, $request) {

            if ($funcionario->user) {

                $user = $funcionario->user;

                $user->name = $dados['nome'];
                $user->email = $dados['email'];
                $user->role = $dados['role'];

                if (!empty($dados['password'])) {
                    $user->password = Hash::make($dados['password']);
                }

                $user->save();

            } else {

                $user = User::create([
                    'name' => $dados['nome'],
                    'email' => $dados['email'],
                    'password' => Hash::make(
                        $dados['password'] ?: '123456'
                    ),
                    'role' => $dados['role'],
                ]);

                $funcionario->user_id = $user->id;
            }

            $funcionario->nome = $dados['nome'];
            $funcionario->cpf = $dados['cpf'];
            $funcionario->ativo = $request->boolean('ativo');

            $funcionario->save();
        });

        return redirect()
            ->route('funcionarios.index')
            ->with('sucesso', 'Voluntário atualizado com sucesso.');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->load('user');

        DB::transaction(function () use ($funcionario) {

            $user = $funcionario->user;

            $funcionario->delete();

            if ($user) {
                $user->delete();
            }
        });

        return redirect()
            ->route('funcionarios.index')
            ->with('sucesso', 'Voluntário removido com sucesso.');
    }
}