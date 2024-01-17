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

     public function validaJogos(Request $request)
     {
         // Defina as regras de validação conforme necessário
         $request->validate([
             'nome' => 'required|string|min:2|max:50',
             'plataforma_id' => 'required|min:1',
             // Adicione outras regras para outros campos, se necessário
         ], [
             'nome.required' => 'O campo nome é obrigatório.',
             'nome.string' => 'O campo nome deve ser uma string.',
             'nome.min' => 'O campo nome deve ter pelo menos 2 caracteres.',
             'nome.max' => 'O campo nome não deve ter mais de 50 caracteres.',
             'plataforma_id.required' => 'Selecionar uma Plataforma é obrigatório.',
             'plataforma_id.min' => 'A plataforma selecionada não é válida.',
             // Adicione mensagens personalizadas para outras regras, se necessário
         ]);
     }

}