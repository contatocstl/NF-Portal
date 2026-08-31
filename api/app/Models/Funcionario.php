<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    protected $fillable = [
        'user_id',
        'cpf',
        'nome',
        'ativo'
    ];

    protected $casts = [
        'ativo' => 'boolean'
    ];

    public function notas(): HasMany
    {
        return $this->hasMany(Nota::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}