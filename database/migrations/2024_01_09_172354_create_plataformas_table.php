<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePlataformasTable extends Migration
{
    public function up()
    {
        Schema::create('plataformas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        // Adicionando os consoles da 3ª à 9ª geração
        $consoles = [
            'NES', // 3ª geração
            'Sega Master System', // 3ª geração
            'Atari 7800', // 3ª geração
            'Sega Genesis', // 4ª geração
            'Super Nintendo Entertainment System', // 4ª geração
            'Neo Geo', // 4ª geração
            'PlayStation', // 5ª geração
            'Sega Saturn', // 5ª geração
            'Nintendo 64', // 5ª geração
            'PlayStation 2', // 6ª geração
            'Sega Dreamcast', // 6ª geração
            'Nintendo GameCube', // 6ª geração
            'Xbox', // 6ª geração
            'PlayStation 3', // 7ª geração
            'Xbox 360', // 7ª geração
            'Wii', // 7ª geração
            'PlayStation 4', // 8ª geração
            'Xbox One', // 8ª geração
            'Nintendo Switch', // 8ª geração
            'Wii U', // 8ª geração
            'PlayStation 5', // 9ª geração
            'Xbox Series X/S', // 9ª geração
            'Steam', // Loja de jogos para PC
            'Epic Games Store', // Loja de jogos para PC
            'GOG', // Good Old Games
            'Origin', // EA Origin
            'Uplay', // Ubisoft Uplay
            'Microsoft Store', // Microsoft Store
            'Humble Store', // Humble Bundle Store
            'Green Man Gaming', // Green Man Gaming
            'Itch.io', // Itch.io
            // Adicione outras lojas de jogos para PC conforme necessário
        ];        
        

        foreach ($consoles as $console) {
            DB::table('plataformas')->insert([
                'nome' => $console,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('plataformas');
    }
}
