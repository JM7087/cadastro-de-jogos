<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlataformasController;

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

Route::get('/', function () {
    return view('welcome');
});

// ======================================== route plataformas ============================================================

// Rota para exibir a lista de plataformas
Route::get('/plataformas', [PlataformasController::class, 'index'])->name('plataformas.index');

// Rota para armazenar uma nova plataforma
Route::post('/plataformas/armazenar', [PlataformasController::class, 'store'])->name('plataformas.store');

// Rota para exibir o formulário de edição de plataforma
Route::get('/plataformas/editar/{id}', [PlataformasController::class, 'edit'])->name('plataformas.edit');

// Rota para atualizar os dados da plataforma após edição
Route::put('/plataformas/atualizar/{id}', [PlataformasController::class, 'update'])->name('plataformas.update');

// Rota para excluir uma plataforma
Route::delete('/plataformas/excluir/{id}', [PlataformasController::class, 'destroy'])->name('plataformas.destroy');

// ========================================================================================================================

