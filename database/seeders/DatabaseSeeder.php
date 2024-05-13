<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\CategoriasSeeder;
use Database\Seeders\PlataformasSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriasSeeder::class,
            PlataformasSeeder::class,
            // outros seeders...
        ]);
    }
}
