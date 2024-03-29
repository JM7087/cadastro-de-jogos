<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Jogo;
use App\Models\JogoCategoria;
use App\Models\JogoPlataforma;
use App\Models\Plataforma;
use App\Services\JogoService;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JogosController extends Controller
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

        return view('jogos_View', ['jogos' => $jogos, 'plataformas' => $plataformas, 'categorias' => $categorias]);
    }

    public function store(Request $request)
    {

        $this->validacaoInputController->validaJogos($request);

        // Criação de um novo jogo
        $jogo = new Jogo();
        $jogo->nome = $request->input('nome');
        $jogo->jogo_finalizado = $request->input('jogo_finalizado');
        // Outros campos a serem atualizados

        $jogo->save();

        // Adicionando o jogo à tabela jogo_plataforma
        DB::table('jogo_plataforma')->insert([
            'jogo_id' => $jogo->id,
            'plataforma_id' => $request->input('plataforma_id'),
            'created_at' =>  new DateTime(),
        ]);

        // Adicionando o jogo à tabela jogo_categoria
        DB::table('jogo_categoria')->insert([
            'jogo_id' => $jogo->id,
            'categoria_id' => $request->input('categoria_id'),
            'created_at' => now(),
        ]);


        // Redirecionar para a página de listagem de jogos
        return redirect('/jogos')->with('success', 'Jogo adicionado com sucesso!');
    }


    public function edit($id)
    {
        $plataformas = Plataforma::orderBy('nome')->get();

        $categorias = Categoria::orderBy('nome')->get();

        $jogo = $this->jogoService->editarJogo($id);

        return view('editarViews.editarJogos_view', ['jogo' => $jogo, 'title' => ' - Editar Jogo', 'plataformas' => $plataformas, 'categorias' => $categorias]);
    }

    public function update(Request $request, $jogoId)
    {
        // Lógica de validação dos dados do formulário para atualização de jogos
        $this->validacaoInputController->validaJogos($request);

        // Processar o envio do formulário de edição e atualizar o jogo
        $jogo = Jogo::findOrFail($jogoId);
        $jogo->nome = $request->input('nome');
        $jogo->jogo_finalizado = $request->input('jogo_finalizado');
        // Outros campos a serem atualizados

        $jogo->save();

        // atualizar plataforma do jogo
        $jogosPlataforma = JogoPlataforma::where('jogo_id', $jogoId)->first();
        $jogosPlataforma->plataforma_id = $request->input('plataforma_id');

        $jogosPlataforma->save();

         // atualizar categoria do jogo
         $jogosCategoria = JogoCategoria::where('jogo_id', $jogoId)->first();
         $jogosCategoria->categoria_id = $request->input('categoria_id');

         $jogosCategoria->save();

        // Redirecionar para a página de listagem de jogos
        return redirect('/jogos')->with('success', 'Jogo Alterado com sucesso!');
    }

    public function confirmarExclusao($id)
    {
        $jogo = Jogo::findOrFail($id);

        $mensagemDeConfimasao = "Tem certeza que deseja Excluir o Jogo ( $jogo->nome )";

        return view(
            'paginasDeConfirmasao.confirmarExclusaoJogo_view',
            ['jogo' => $jogo, 'title' => ' - Excluir Jogo', 'mensagemDeConfimasao' => $mensagemDeConfimasao]
        );
    }

    public function destroy($id)
    {
        // Encontre o jogo pelo ID
        $jogo = Jogo::findOrFail($id);

        // Excluir relacionamendo (jogo_plataforma)
        DB::table('jogo_plataforma')->where('jogo_id', $id)->delete();

        // Excluir relacionamendo (jogo_categoria)
        DB::table('jogo_categoria')->where('jogo_id', $id)->delete();

        // Agora, você pode excluir o jogo
        $jogo->delete();

        // Redirecione para a página de listagem de jogos
        return redirect('/jogos')->with('success', 'Jogo excluído com sucesso!');
    }
}
