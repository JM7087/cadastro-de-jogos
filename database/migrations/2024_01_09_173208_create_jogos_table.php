<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Verifica se a tabela 'jogos' já existe antes de criar
        if (!Schema::hasTable('jogos')) {
            Schema::create('jogos', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->boolean('jogo_finalizado')->default(false);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jogos');
    }
};
