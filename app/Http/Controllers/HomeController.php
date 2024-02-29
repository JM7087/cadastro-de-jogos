<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Plataforma;
use App\Services\JogoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    private $validacaoInputController;
    private $jogoService;

    public function __construct(ValidacaoInputController $validacaoInputController, Jogoservice $jogoService)
    {
        $this->validacaoInputController = $validacaoInputController;
        $this->jogoService = $jogoService;
    }

    public function index()
    {

        $plataformas = Plataforma::orderBy('nome')->get();

        $categorias = Categoria::orderBy('nome')->get();

        $jogos = $this->jogoService->listarJogosPlataformasCategorias();

        return view('home_View', 
                   ['jogos' => $jogos, 'plataformas' => $plataformas, 'consultar' => false, 'categorias' => $categorias,
                   'nomeConsultar' => null, 'jogoFinalizado' => null, 'title' => '', 'plataformaId' => null, 'categoriaId' => null]);

    }

    public function consultar(Request $request)
    {

        $this->validacaoInputController->validaConsultarJogos($request);

        $nomeJogo = $request->input('nome');
        $jogoFinalizado = $request->input('jogo_finalizado');
        $categoriaId = $request->input('categoria_id');
        $plataformaId = $request->input('plataforma_id');

        $plataformas = Plataforma::orderBy('nome')->get();

        $categorias = Categoria::orderBy('nome')->get();

        $jogos = $this->jogoService->consultarFiltrdaDeJogos($nomeJogo, $plataformaId, $jogoFinalizado, $categoriaId);

        return view('home_View', 
                   ['jogos' => $jogos, 'plataformas' => $plataformas, 'categorias' => $categorias,
                    'consultar' => true, 'nomeJogo' => $nomeJogo, 'jogoFinalizado' => $jogoFinalizado, 
                    'categoriaId' => $categoriaId, 'plataformaId' => $plataformaId, 'title' => ' - Consultar']);
    }
}