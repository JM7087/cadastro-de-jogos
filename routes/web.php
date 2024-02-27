<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlataformasController;
use App\Http\Controllers\JogosController;
use App\Http\Controllers\CategoriasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  [HomeController::class, 'index'])->name('home.index');

Route::get('/home/consultar', [HomeController::class, 'consultar'])->name('home.consultar');

// ======================================== route jogos ============================================================

// Rota para exibir a lista de jogos
Route::get('/jogos', [JogosController::class, 'index'])->name('jogos.index');

// Rota para armazenar um novo jogo
Route::post('/jogos/armazenar', [JogosController::class, 'store'])->name('jogos.store');

// Rota para exibir o formulário de edição de jogo
Route::get('/jogos/editar/{id}', [JogosController::class, 'edit'])->name('jogos.edit');

// Rota para atualizar os dados do jogo após edição
Route::put('/jogos/atualizar/{id}', [JogosController::class, 'update'])->name('jogos.update');

// Rota para exibir a página de confirmação de exclusão de jogo
Route::get('/jogos/confirmarExclusao/{id}', [JogosController::class, 'confirmarExclusao'])->name('jogos.confirmarExclusao');

// Rota para excluir um jogo
Route::delete('/jogos/excluir/{id}', [JogosController::class, 'destroy'])->name('jogos.destroy');



// ======================================== route plataformas ============================================================

// Rota para exibir a lista de plataformas
Route::get('/plataformas', [PlataformasController::class, 'index'])->name('plataformas.index');

// Rota para armazenar uma nova plataforma
Route::post('/plataformas/armazenar', [PlataformasController::class, 'store'])->name('plataformas.store');

// Rota para exibir o formulário de edição de plataforma
Route::get('/plataformas/editar/{id}', [PlataformasController::class, 'edit'])->name('plataformas.edit');

// Rota para atualizar os dados da plataforma após edição
Route::put('/plataformas/atualizar/{id}', [PlataformasController::class, 'update'])->name('plataformas.update');

// Rota para exibir o pagina de confirmar exclusao de plataforma
Route::get('/plataformas/confirmarExclusao/{id}', [PlataformasController::class, 'confirmarExclusao'])->name('plataformas.confirmarExclusao');

// Rota para excluir uma plataforma
Route::delete('/plataformas/excluir/{id}', [PlataformasController::class, 'destroy'])->name('plataformas.destroy');

// ======================================== route categorias ============================================================

// Rota para exibir a lista de categorias
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');

// Rota para armazenar uma nova categoria
Route::post('/categorias/armazenar', [CategoriasController::class, 'store'])->name('categorias.store');

// Rota para exibir o formulário de edição de categoria
Route::get('/categorias/editar/{id}', [CategoriasController::class, 'edit'])->name('categorias.edit');

// Rota para atualizar os dados da categoria após edição
Route::put('/categorias/atualizar/{id}', [CategoriasController::class, 'update'])->name('categorias.update');

// Rota para exibir a página de confirmação de exclusão de categoria
Route::get('/categorias/confirmarExclusao/{id}', [CategoriasController::class, 'confirmarExclusao'])->name('categorias.confirmarExclusao');

// Rota para excluir uma categoria
Route::delete('/categorias/excluir/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
