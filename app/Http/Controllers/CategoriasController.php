<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidacaoInputController;
use App\Models\Categoria;
use App\Models\JogoCategoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    private $validacaoInputController;

    public function __construct(ValidacaoInputController $validacaoInputController)
    {
        $this->validacaoInputController = $validacaoInputController;
    }

    public function index()
    {
        $categorias = Categoria::orderBy('nome')->paginate(6);
        
        return view('categorias_View', ['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $this->validacaoInputController->validaCategorias($request);

        // Processar o envio do formulário e armazenar a nova categoria
        $categoria = new Categoria();
        $categoria->nome = $request->input('nome');
        // Outros campos, se houver

        $categoria->save();

        // Redirecionar para a página de listagem de categorias
        return redirect('/categorias')->with('success', 'Categoria adicionada com sucesso!');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('editarViews.editarCategoria_view', ['categoria' => $categoria, 'title' => ' - Editar Categoria']);
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $this->validacaoInputController->validaCategorias($request);

        // Processar o envio do formulário de edição e atualizar a categoria
        $categoria = Categoria::findOrFail($id);
        $categoria->nome = $request->input('nome');
        // Outros campos a serem atualizados, se houver

        $categoria->save();

        // Redirecionar para a página de listagem de categorias
        return redirect('/categorias')->with('success', 'Categoria alterada com sucesso!');
    }

    public function confirmarExclusao($id)
    {
        $categoria = Categoria::findOrFail($id);
       // redirecionar para pagina de exlusão

       $title = ' - Excluir Categoria';

       // verificar relacionamento categoria jogos
       $jogoCategoria = JogoCategoria::where('categoria_id', $id)->exists();

       $disabled = false;

       if ($jogoCategoria) {

           $disabled = true;

           $mensagemDeConfimasao = "A categoria ( $categoria->nome ) está ligado a um ou mais jogos. Você não pode deletá-lo.";

           return view('paginasDeConfirmasao.confirmarExclusaoCategoria_view', 
                      ['categoria' => $categoria, 'title' => $title, 'mensagemDeConfimasao' => $mensagemDeConfimasao, 'disabled' => $disabled]);
       }

       $mensagemDeConfimasao = "Tem certeza que deseja excluir esta Categoria ( $categoria->nome )";

       return view('paginasDeConfirmasao.confirmarExclusaoCategoria_view',
                  ['categoria' => $categoria, 'title' => $title, 'mensagemDeConfimasao' => $mensagemDeConfimasao, 'disabled' => $disabled]);
    }

    public function destroy($id)
    {
        // Encontrar a categoria pelo ID e excluí-la
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        // Redirecionar para a página de listagem de categorias
        return redirect('/categorias')->with('success', 'Categoria excluída com sucesso!');
    }
}
