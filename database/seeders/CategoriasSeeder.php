<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
