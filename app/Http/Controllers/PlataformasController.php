<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidacaoInputController;
use App\Models\Plataforma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlataformasController extends Controller
{
    private $validacaoInputController;

    public function __construct(ValidacaoInputController $validacaoInputController)
    {
        $this->validacaoInputController = $validacaoInputController;
    }

    public function index()
    {
        $plataformas = Plataforma::all();

        // Log::debug("emtrou");

        return view('plataformas_View', ['plataformas' => $plataformas]);
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $this->validacaoInputController->validateFormData($request);

        // Processar o envio do formulário e armazenar a nova plataforma
        $plataforma = new Plataforma();
        $plataforma->nome = $request->input('nome');
        // Outros campos

        $plataforma->save();

        // Redirecionar para a página de listagem de plataformas
        return redirect('/plataformas');
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $this->validacaoInputController->validateFormData($request);

        // Processar o envio do formulário de edição e atualizar a plataforma
        $plataforma = Plataforma::findOrFail($id);
        $plataforma->nome = $request->input('nome');
        // Outros campos a serem atualizados

        $plataforma->save();

        // Redirecionar para a página de listagem de plataformas
        return redirect('/plataformas');
    }
}
