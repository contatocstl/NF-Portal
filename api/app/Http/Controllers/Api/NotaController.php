<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function receber(Request $request)
    {
        $dados = $request->validate([
            'cpf' => ['required', 'string', 'size:11'],
            'chave' => ['required', 'string', 'size:44'],
            'status' => ['required', 'in:sucesso,erro'],
            'mensagem' => ['nullable', 'string'],
            'data_cadastro' => ['required', 'date'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Verificar se a nota já foi cadastrada
        |--------------------------------------------------------------------------
        */

        $notaExistente = Nota::where(
            'chave',
            $dados['chave']
        )->first();

        if ($notaExistente) {
            return response()->json([
                'success' => false,
                'duplicate' => true,
                'message' => 'Esta nota já está cadastrada.',
                'nota' => $notaExistente,
            ], 409);
        }

        /*
        |--------------------------------------------------------------------------
        | Localizar ou criar funcionário pelo CPF
        |--------------------------------------------------------------------------
        */

        $funcionario = Funcionario::firstOrCreate(
            [
                'cpf' => $dados['cpf'],
            ],
            [
                'nome' => null,
                'ativo' => true,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Cadastrar nota
        |--------------------------------------------------------------------------
        */

        $nota = Nota::create([
            'funcionario_id' => $funcionario->id,
            'chave' => $dados['chave'],
            'status' => $dados['status'],
            'mensagem' => $dados['mensagem'] ?? null,
            'data_cadastro' => $dados['data_cadastro'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Resposta
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'success' => true,
            'message' => 'Nota registrada com sucesso.',
            'nota' => $nota,
        ]);
    }
}