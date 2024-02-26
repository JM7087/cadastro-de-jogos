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
        Schema::create('jogo_categoria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jogo_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();

            $table->foreign('jogo_id')->references('id')->on('jogos')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

      /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jogos_categoria');
    }
};