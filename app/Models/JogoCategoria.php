<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JogoCategoria extends Model
{
    use HasFactory;

    protected $table = 'jogo_categoria';

    protected $fillable = [
        'jogo_id',
        'categoria_id',
        'created_at',
    ];

    // Outros métodos, relacionamentos, escopos, etc., podem ser adicionados conforme necessário
}
