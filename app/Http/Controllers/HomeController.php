<?php

namespace App\Http\Controllers;

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

        $jogos = $this->jogoService->listarJogosPlataformas();

        return view('home_View', 
                   ['jogos' => $jogos, 'plataformas' => $plataformas, 'consultar' => false, 
                    'nomeConsultar' => null, 'jogoFinalizado' => null, 'title' => '', 'plataformaId' => null]);

    }

    public function consultar(Request $request)
    {
        // log::debug($request);

        $nomeJogo = $request->input('nome');
        $plataformaId = $request->input('plataforma_id');
        $jogoFinalizado = $request->input('jogo_finalizado');

        $plataformas = Plataforma::orderBy('nome')->get();

        $jogos = $this->jogoService->consultarJogosPlataformas($nomeJogo, $plataformaId, $jogoFinalizado);

        return view('home_View', 
                   ['jogos' => $jogos, 'plataformas' => $plataformas, 'consultar' => true, 
                    'nomeJogo' => $nomeJogo, 'jogoFinalizado' => $jogoFinalizado, 
                    'plataformaId' => $plataformaId, 'title' => ' - Consultar']);
    }
}