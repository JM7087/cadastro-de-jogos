<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use App\Models\Plataforma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JogosController extends Controller
{
    private $validacaoInputController;

    public function __construct(ValidacaoInputController $validacaoInputController)
    {
        $this->validacaoInputController = $validacaoInputController;
    }

    public function index()
    {
        $plataformas = Plataforma::orderBy('nome')->get();

        $jogos = DB::table('jogo_plataforma')
            ->join('jogos', 'jogo_plataforma.jogo_id', '=', 'jogos.id')
            ->join('plataformas', 'jogo_plataforma.plataforma_id', '=', 'plataformas.id')
            ->select(
                'jogos.id as jogos_id',
                'plataformas.id as plataformas_id',
                'jogos.nome as nome_jogo',

                // ou adiciona na view <td>{{ $jogo->jogo_finalizado == 1 ? 'Sim' : 'Não' }}</td>
                DB::raw("CASE WHEN jogos.jogo_finalizado = 1 THEN 'Sim' ELSE 'Não' END AS jogo_finalizado"),
                'plataformas.nome as nome_plataforma'
            )
            ->get();

        return view('jogos_View', ['jogos' => $jogos, 'plataformas' => $plataformas]);
    }

    public function store(Request $request)
    {
        log::debug($request);

        $this->validacaoInputController->validateFormData($request);

        // // Criação de um novo jogo
        // $jogo = new Jogo();
        // $jogo->nome = $request->input('nome');
        // $jogo->jogo_finalizado = $request->has('jogo_finalizado') ? true : false;
        // // Outros campos a serem atualizados

        // $jogo->save();

        // // Adicionando o jogo à tabela jogo_plataforma
        // DB::table('jogo_plataforma')->insert([
        //     'jogo_id' => $jogo->id,
        //     'plataforma_id' => $request->input('plataforma_id'),
        // ]);

        // Redirecionar para a página de listagem de jogos
        return redirect('/jogos')->with('success', 'Jogo adicionado com sucesso!');
    }


    public function edit($id)
    {
        $jogo = DB::table('jogo_plataforma')
            ->join('jogos', 'jogo_plataforma.jogo_id', '=', 'jogos.id')
            ->join('plataformas', 'jogo_plataforma.plataforma_id', '=', 'plataformas.id')
            ->select('jogos.nome as nome_jogo', 'jogos.jogo_finalizado', 'plataformas.nome as nome_plataforma')
            ->where('jogo_plataforma.jogo_id', $id)
            ->get();

        $title = 'Editar Jogo';

        return view('editar', ['jogo' => $jogo, 'title' => $title]);
    }

    public function update(Request $request, $id)
    {
        // Lógica de validação dos dados do formulário para atualização de jogos
        // ...

        // Processar o envio do formulário de edição e atualizar o jogo
        $jogo = Jogo::findOrFail($id);
        $jogo->nome = $request->input('nome');
        $jogo->jogo_finalizado = $request->input('jogo_finalizado');
        // Outros campos a serem atualizados

        $jogo->save();

        // Redirecionar para a página de listagem de jogos
        return redirect('/jogos');
    }

    public function destroy($id)
    {
        // Encontre o jogo pelo ID
        $jogo = Jogo::findOrFail($id);

        // Excluir entradas na tabela intermediária (jogo_plataforma)
        DB::table('jogo_plataforma')->where('jogo_id', $id)->delete();

        // Agora, você pode excluir o jogo
        $jogo->delete();

        // Redirecione para a página de listagem de jogos
        return redirect('/jogos')->with('success', 'Jogo excluído com sucesso!');
    }
}
