<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';

    protected $fillable = [
        'funcionario_id',
        'chave',
        'status',
        'mensagem',
        'data_cadastro'
    ];

    protected $casts = [
        'data_cadastro' => 'datetime'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}