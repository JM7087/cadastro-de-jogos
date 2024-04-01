<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidacaoInputController;
use App\Models\JogoPlataforma;
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

        $plataformas = Plataforma::orderBy('nome')->paginate(6);

        return view('plataformas_View', ['plataformas' => $plataformas]);
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $this->validacaoInputController->validaPlataforma($request);

        // Processar o envio do formulário e armazenar a nova plataforma
        $plataforma = new Plataforma();
        $plataforma->nome = $request->input('nome');
        // Outros campos

        $plataforma->save();

        // Redirecionar para a página de listagem de plataformas
        return redirect('/plataformas')->with('success', 'Plataforma Adicionada com sucesso!');
    }

    public function edit($id)
    {
        $plataforma = Plataforma::findOrFail($id);
        // redirecionar para pagina de edição

        return view('editarViews.editarPlataforma_view', ['plataforma' => $plataforma, 'title' => ' - Editar Plataforma']);
    }


    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $this->validacaoInputController->validaPlataforma($request);

        // Processar o envio do formulário de edição e atualizar a plataforma
        $plataforma = Plataforma::findOrFail($id);
        $plataforma->nome = $request->input('nome');
        // Outros campos a serem atualizados

        $plataforma->save();

        // Redirecionar para a página de listagem de plataformas
        return redirect('/plataformas')->with('success', 'Plataforma Alterada com sucesso!');
    }

    public function confirmarExclusao($id)
    {
        $plataforma = Plataforma::findOrFail($id);
        // redirecionar para pagina de exlusão

        $title = ' - Excluir Plataforma';

        // verificar relacionamento plataforma jogos
        $jogoPlataforma = JogoPlataforma::where('plataforma_id', $id)->exists();

        $disabled = false;

        if ($jogoPlataforma) {

            $disabled = true;

            $mensagemDeConfimasao = "A plataforma ( $plataforma->nome ) está ligado a um ou mais jogos. Você não pode deletá-lo.";

            return view('paginasDeConfirmasao.confirmarExclusaoPlataforma_view', 
                       ['plataforma' => $plataforma, 'title' => $title, 'mensagemDeConfimasao' => $mensagemDeConfimasao, 'disabled' => $disabled]);
        }

        $mensagemDeConfimasao = "Tem certeza que deseja excluir esta Plataforma ( $plataforma->nome )";

        return view('paginasDeConfirmasao.confirmarExclusaoPlataforma_view',
                   ['plataforma' => $plataforma, 'title' => $title, 'mensagemDeConfimasao' => $mensagemDeConfimasao, 'disabled' => $disabled]);
    }

    public function destroy($id)
    {
        // Encontrar a plataforma pelo ID e excluí-la
        $plataforma = Plataforma::findOrFail($id);

         // verificar relacionamento plataforma jogos
         $jogoPlataforma = JogoPlataforma::where('plataforma_id', $id)->exists();
 
         if ($jogoPlataforma) return redirect()->back()->with('warning', "A plataforma ( $plataforma->nome ) está ligado a um ou mais jogos. Você não pode deletá-lo.");

        $plataforma->delete();

        // Redirecionar para a página de listagem de plataformas
        return redirect('/plataformas')->with('success', 'Plataforma excluído com sucesso!');
    }
}
