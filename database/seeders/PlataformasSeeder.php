<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlataformasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Adicionando os consoles da 3ª à 9ª geração e algumas lojas de jogos para PC
        $plataformas = [
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

        foreach ($plataformas as $plataforma) {
            DB::table('plataformas')->insert([
                'nome' => $plataforma,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
