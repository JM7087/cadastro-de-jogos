<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlataformasTable extends Migration
{
    public function up()
    {
        // Verifica se a tabela 'plataformas' já existe antes de criar
        if (!Schema::hasTable('plataformas')) {
            Schema::create('plataformas', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('plataformas');
    }
}
