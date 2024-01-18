<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JogoPlataforma extends Model
{
    use HasFactory;

    protected $table = 'jogo_plataforma';

    protected $fillable = [
        'jogo_id',
        'plataforma_id',
        'created_at',
    ];

    // Outros métodos, relacionamentos, escopos, etc., podem ser adicionados conforme necessário
}
