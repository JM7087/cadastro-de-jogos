@extends('layouts.app')

@section('title', ' - Lista Categorias')


@section('content')

<form action="{{ route('categorias.store') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nome da Categoria" name="nome">
        <button class="btn btn-success" type="submit">Adicionar</button>
    </div>

    <!-- notificação de erro -->
    @include('notificacaos')

</form>


@if($categorias->isEmpty())

<center>
    <h4>Nenhuma Categoria Cadastrada</h4>
</center>

@else

<table class="table table-bordered">
    <thead>
        <tr class="table-info">
            <th>Nome</th>
            <th class="btn-tabela-th-td">Editar</th>
            <th class="btn-tabela-th-td">Excluir</th>
            <!-- Adicione outras colunas conforme necessário -->
        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>{{ $categoria->nome }}</td>
            <td class="btn-tabela-th-td">
                <!-- Botão Editar -->
                <a href="{{ route('categorias.edit', ['id' => $categoria->id]) }}" class="btn btn-primary">Editar</a>
            </td>

            <td class="btn-tabela-th-td">
                <!-- Botão Excluir -->
                <a href="{{ route('categorias.confirmarExclusao', ['id' => $categoria->id]) }}"
                    class="btn btn-danger">Excluir</a>
            </td>
            <!-- Adicione outras colunas conforme necessário -->
        </tr>
        @endforeach
    </tbody>
</table>

@endif

@if ($categorias->total() > 6)
<!-- Links de Paginação -->
@include('componentes.links_paginacao', ['paginator' => $categorias])
@endif

@endsection