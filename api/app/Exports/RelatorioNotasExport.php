<?php

namespace App\Exports;

use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Enumerable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RelatorioNotasExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection(): Enumerable
    {
        $query = Nota::with('funcionario');

        if ($this->request->filled('funcionario_id')) {
            $query->where(
                'funcionario_id',
                $this->request->funcionario_id
            );
        }

        if ($this->request->filled('data_inicio')) {
            $query->whereDate(
                'data_cadastro',
                '>=',
                $this->request->data_inicio
            );
        }

        if ($this->request->filled('data_fim')) {
            $query->whereDate(
                'data_cadastro',
                '<=',
                $this->request->data_fim
            );
        }

        if ($this->request->filled('status')) {
            $query->where(
                'status',
                $this->request->status
            );
        }

        return $query
            ->orderByDesc('data_cadastro')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Voluntário',
            'CPF',
            'Chave NFP',
            'Status',
            'Mensagem',
            'Data',
        ];
    }

    public function map($nota): array
    {
        return [
            $nota->id,

            $nota->funcionario?->nome
                ?? $nota->funcionario?->name
                ?? 'Sem nome',

            $nota->funcionario?->cpf
                ?? 'Não informado',

            $nota->chave,

            strtoupper($nota->status),

            $nota->mensagem,

            $nota->data_cadastro
                ? \Carbon\Carbon::parse($nota->data_cadastro)
                    ->format('d/m/Y H:i:s')
                : '',
        ];
    }
}