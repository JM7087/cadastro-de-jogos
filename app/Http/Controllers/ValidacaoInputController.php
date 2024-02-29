<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ValidacaoInputController extends Controller
{

     // Método para validação
     public function validaPlataforma(Request $request)
     {
         // Defina as regras de validação conforme necessário
         $request->validate([
             'nome' => 'required|string|min:2|max:50',
             // Adicione outras regras para outros campos, se necessário
         ], [
             'nome.required' => 'O campo nome é obrigatório.',
             'nome.string' => 'O campo nome deve ser uma string.',
             'nome.min' => 'O campo nome deve ter pelo menos 2 caracteres.',
             'nome.max' => 'O campo nome não deve ter mais de 50 caracteres.',
             // Adicione mensagens personalizadas para outras regras, se necessário
         ]);
     }

     public function validaCategorias(Request $request)
     {
         // Defina as regras de validação conforme necessário
         $request->validate([
             'nome' => 'required|string|min:2|max:50',
             // Adicione outras regras para outros campos, se necessário
         ], [
             'nome.required' => 'O campo nome é obrigatório.',
             'nome.string' => 'O campo nome deve ser uma string.',
             'nome.min' => 'O campo nome deve ter pelo menos 2 caracteres.',
             'nome.max' => 'O campo nome não deve ter mais de 50 caracteres.',
             // Adicione mensagens personalizadas para outras regras, se necessário
         ]);
     }

     public function validaJogos(Request $request)
     {
         // Defina as regras de validação conforme necessário
         $request->validate([
             'nome' => 'required|string|min:2|max:50',
             'plataforma_id' => 'required',
             'jogo_finalizado' => 'required',
             'categoria_id' => 'required',
             // Adicione outras regras para outros campos, se necessário
         ], [
             'nome.required' => 'O campo nome é obrigatório.',
             'nome.string' => 'O campo nome deve ser uma string.',
             'nome.min' => 'O campo nome deve ter pelo menos 2 caracteres.',
             'nome.max' => 'O campo nome não deve ter mais de 50 caracteres.',
             'plataforma_id.required' => 'Selecionar uma Plataforma é obrigatório.',
             'categoria_id.required' => 'Selecionar uma Categoria é obrigatório.',
             'jogo_finalizado.required' => 'Selecionar uma Opção de Jogo Finalizado é obrigatório.',
             // Adicione mensagens personalizadas para outras regras, se necessário
         ]);
     }

     public function validaConsultarJogos(Request $request)
     {
         // Defina as regras de validação conforme necessário
         $request->validate([
             'nome' => 'required_without_all:plataforma_id,jogo_finalizado,categoria_id',
             'plataforma_id' => 'required_without_all:jogo_finalizado,categoria_id,nome',
             'jogo_finalizado' => 'required_without_all:plataforma_id,categoria_id,nome',
             'categoria_id' => 'required_without_all:jogo_finalizado,plataforma_id,nome',
             // Adicione outras regras para outros campos, se necessário
         ], [
            'required_without_all' => 'Preencher pelo menos um dos campos (Plataforma, Categoria, Jogo Finalizado, Nome) é obrigatório.',
             // Adicione mensagens personalizadas para outras regras, se necessário
         ]);
     }

}