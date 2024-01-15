@extends('layouts.app')

@section('title', 'Lista Jogos')

@section('content')

<form action="{{ route('jogos.store') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nome do Jogo" name="nome">
        
        <!-- Adicionando o campo de seleção para as plataformas -->
        <select class="form-select" name="plataforma_id" aria-label="Plataformas">
            <option value="" disabled selected>Selecionar uma Plataforma</option>
            @foreach($plataformas as $plataforma)
                <option value="{{ $plataforma->id }}">{{ $plataforma->nome }}</option>
            @endforeach
        </select>

        <button class="btn btn-success" type="submit">Adicionar</button>
    </div>

    <!-- notificação de erro -->
    @error('nome')
    <div class="alert alert-danger" id="mesagem">{{ $message }}</div>
    @enderror

    <!-- notificação de sucesso -->
    @if(session('success'))
    <div class="alert alert-success mt-3" id="mesagem">
        {{ session('success') }}
    </div>
    @endif

</form>

<table class="table table-bordered">
    <thead>
        <tr class="table-info">
            <th>Jogo</th>
            <th>Plataforma</th>
            <th class="btn-tabela-th-td">Editar</th>
            <th class="btn-tabela-th-td">Excluir</th>
            <!-- Adicione outras colunas conforme necessário -->
        </tr>
    </thead>
    <tbody>
        @foreach($jogos as $jogo)
        <tr>
            <td>{{ $jogo->nome_jogo }}</td>
            <td>{{ $jogo->nome_plataforma }}</td>
            <td class="btn-tabela-th-td">
                <!-- Botão Editar -->
                <a href="{{ route('plataformas.edit', ['id' => $jogo->jogos_id]) }}" class="btn btn-primary">Editar</a>
            </td>

            <td class="btn-tabela-th-td">
                <!-- Botão Excluir -->
                <a href="{{ route('plataformas.confirmarExclusao', ['id' => $jogo->jogos_id]) }}" class="btn btn-danger">Excluir</a>
            </td>
            <!-- Adicione outras colunas conforme necessário -->
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
