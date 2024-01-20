@extends('layouts.app')

@section('title', ' - Lista Jogos')

@section('content')

<form action="{{ route('jogos.store') }}" method="POST">
    @csrf

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nome do Jogo" name="nome">

        <!-- Adicionando o checkbox -->
        {{-- <div class="mx-2 py-1">
            <label class="form-check-label" for="jogo_finalizado">Finalizado</label>
            <input class="form-check-input" type="checkbox" name="jogo_finalizado" id="jogo_finalizado">
        </div> --}}

       <!-- Adicionando o campo de seleção para jogo finalizado -->
        <select class="form-select" name="jogo_finalizado">
            <option value="null" disabled selected hidden>Jogo Finalizado Selecionar Sim ou Não</option>
            <option value="1">Sim</option>
            <option value="0">Não</option>

        </select>


        <!-- Adicionando o campo de seleção para as plataformas -->
        <select class="form-select" name="plataforma_id" aria-label="Plataformas">
            <option value="null" disabled selected hidden>Selecionar uma Plataforma</option>
            @foreach($plataformas as $plataforma)
            <option value="{{ $plataforma->id }}">{{ $plataforma->nome }}</option>
            @endforeach
        </select>

        <button class="btn btn-success" type="submit">Adicionar</button>
    </div>

    <!-- notificação de erro -->
    @include('notificacaos')


</form>


@if($jogos->isEmpty())

<center>
    <h4>Nem um Jogo Cadastrado</h4>
</center>

@else

<table class="table table-bordered">
    <thead>
        <tr class="table-info">
            <th class="jogos-tabela-th-td">Jogo</th>
            <th class="jogo-finalizado-tabela-th-td">Finalizado</th>
            <th>Plataforma</th>
            <th class="btn-tabela-th-td">Editar</th>
            <th class="btn-tabela-th-td">Excluir</th>
            <!-- Adicione outras colunas conforme necessário -->
        </tr>
    </thead>
    <tbody>
        @foreach($jogos as $jogo)
        <tr>
            <td class="jogos-tabela-th-td">{{ $jogo->nome_jogo }}</td>
            <td class="jogo-finalizado-tabela-th-td">{{ $jogo->jogo_finalizado }}</td>
            <td>{{ $jogo->nome_plataforma }}</td>
            <td class="btn-tabela-th-td">
                <!-- Botão Editar -->
                <a href="{{ route('jogos.edit', ['id' => $jogo->jogos_id]) }}" class="btn btn-primary">Editar</a>
            </td>

            <td class="btn-tabela-th-td">
                <!-- Botão Excluir -->
                <a href="{{ route('jogos.confirmarExclusao', ['id' => $jogo->jogos_id]) }}"
                    class="btn btn-danger">Excluir</a>
            </td>
            <!-- Adicione outras colunas conforme necessário -->
        </tr>
        @endforeach

    </tbody>
</table>

@endif

@endsection