@extends('layouts.app')

@section('title', 'Lista Plataformas')


@section('content')

<form action="{{ route('plataformas.store') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nome da Plataforma" name="nome">
        <button class="btn btn-success" type="submit">Adicionar</button>
    </div>

    @error('nome')
    <div class="alert alert-danger" id="error-message">{{ $message }}</div>
    @enderror
    
</form>

<table class="table table-bordered">
    <thead>
        <tr class="table-info">
            <th>ID</th>
            <th>Nome</th>
            <th class="btn-tabela-th-td">Editar</th>
            <th class="btn-tabela-th-td">Exluir</th>
            <!-- Adicione outras colunas conforme necessário -->
        </tr>
    </thead>
    <tbody>
        @foreach($plataformas as $plataforma)
        <tr>
            <td>{{ $plataforma->id }}</td>
            <td>{{ $plataforma->nome }}</td>
            <td class="btn-tabela-th-td">
                <!-- Botão Editar -->
                <a href="{{ route('plataformas.edit', ['id' => $plataforma->id]) }}" class="btn btn-primary">Editar</a>
            </td>

            <td class="btn-tabela-th-td">
                <!-- Botão Excluir -->
                <form action="{{ route('plataformas.destroy', ['id' => $plataforma->id]) }}" method="POST"
                    style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
            <!-- Adicione outras colunas conforme necessário -->
        </tr>
        @endforeach
    </tbody>
</table>

@endsection