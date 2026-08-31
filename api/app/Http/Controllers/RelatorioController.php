<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        $query = Nota::with('funcionario');

        // Filtro por funcionário
        if ($request->filled('funcionario_id')) {
            $query->where(
                'funcionario_id',
                $request->funcionario_id
            );
        }

        // Filtro por data inicial
        if ($request->filled('data_inicio')) {
            $query->whereDate(
                'data_cadastro',
                '>=',
                $request->data_inicio
            );
        }

        // Filtro por data final
        if ($request->filled('data_fim')) {
            $query->whereDate(
                'data_cadastro',
                '<=',
                $request->data_fim
            );
        }

        // Filtro por status
        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        // Mais recentes primeiro.
        // Em caso de mesma data/hora, maior ID primeiro.
        $notas = $query
            ->orderByDesc('data_cadastro')
            ->orderByDesc('id')
            ->get();

        $funcionarios = Funcionario::orderBy('nome')->get();

        $totalNotas = $notas->count();

        $totalSucesso = $notas
            ->where('status', 'sucesso')
            ->count();

        $totalErros = $notas
            ->where('status', 'erro')
            ->count();

        $totalFuncionarios = Funcionario::count();

        return view('relatorios.index', compact(
            'notas',
            'funcionarios',
            'totalNotas',
            'totalSucesso',
            'totalErros',
            'totalFuncionarios'
        ));
    }
}