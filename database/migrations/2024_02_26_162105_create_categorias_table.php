<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        // Categorias a serem inseridas
        $categorias = [
            'Ação',
            'Aventura',
            'RPG',
            'Estratégia',
            'Simulação',
            'Esportes',
            'Corrida',
            'Luta',
            'Plataforma',
            'Puzzle',
            'Tiro',
            'Música',
            'Horror de Sobrevivência',
            'MOBA', // Multiplayer Online Battle Arena
            'MMORPG', // Massively Multiplayer Online Role-Playing Game

            // Adicione mais categorias conforme necessário
        ];

        // Inserir as categorias no banco de dados
        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert([
                'nome' => $categoria,
                'created_at' =>  new DateTime(),
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
