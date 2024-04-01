@extends('layouts.app')

@section('title', ' - Lista Plataformas')


@section('content')

<form action="{{ route('plataformas.store') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nome da Plataforma" name="nome">
        <button class="btn btn-success" type="submit">Adicionar</button>
    </div>

    <!-- notificação de erro -->
    @include('notificacaos')

</form>


@if($plataformas->isEmpty())

    <center>
        <h4>Nem uma Plataforma Cadastrada</h4>
    </center>

@else

    <table class="table table-bordered">
        <thead>
            <tr class="table-info">
                <th>Nome</th>
                <th class="btn-tabela-th-td">Editar</th>
                <th class="btn-tabela-th-td">Exluir</th>
                <!-- Adicione outras colunas conforme necessário -->
            </tr>
        </thead>
        <tbody>
            @foreach($plataformas as $plataforma)
            <tr>
                <td>{{ $plataforma->nome }}</td>
                <td class="btn-tabela-th-td">
                    <!-- Botão Editar -->
                    <a href="{{ route('plataformas.edit', ['id' => $plataforma->id]) }}" class="btn btn-primary">Editar</a>
                </td>

                <td class="btn-tabela-th-td">
                    <!-- Botão Excluir -->
                    <a href="{{ route('plataformas.confirmarExclusao', ['id' => $plataforma->id]) }}"
                        class="btn btn-danger">Excluir</a>
                </td>
                <!-- Adicione outras colunas conforme necessário -->
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endif

 <!-- Links de Paginação -->
 @include('componentes.links_paginacao', ['paginator' => $plataformas])

@endsection