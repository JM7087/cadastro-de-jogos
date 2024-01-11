<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Plataforma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlataformasController extends Controller
{

    public function index()
    {
        $plataformas = Plataforma::all();

        // Log::debug("emtrou");

        return view('plataformas_View', ['plataformas' => $plataformas]);
    }

    public function create()
    {
        // Exibir o formulário de criação de plataforma
        return view('plataformas_create');
    }

    public function store(Request $request)
    {
        // Processar o envio do formulário e armazenar a nova plataforma
        // Validação dos dados do formulário e armazenamento
        $plataforma = new Plataforma();
        $plataforma->nome = $request->input('nome');
        // Outros campos

        $plataforma->save();

        // Redirecionar para a página de listagem de plataformas
        return redirect('/plataformas');
    }

    public function edit($id)
    {
        // Buscar a plataforma pelo ID e exibir o formulário de edição
        $plataforma = Plataforma::findOrFail($id);
        return view('plataformas_edit', ['plataforma' => $plataforma]);
    }

    public function update(Request $request, $id)
    {
        // Processar o envio do formulário de edição e atualizar a plataforma
        $plataforma = Plataforma::findOrFail($id);
        $plataforma->nome = $request->input('nome');
        // Outros campos a serem atualizados

        $plataforma->save();

        // Redirecionar para a página de listagem de plataformas
        return redirect('/plataformas');
    }

    public function destroy($id)
    {
        // Encontrar a plataforma pelo ID e excluí-la
        $plataforma = Plataforma::findOrFail($id);
        $plataforma->delete();

        // Redirecionar para a página de listagem de plataformas
        return redirect('/plataformas');
    }

}
