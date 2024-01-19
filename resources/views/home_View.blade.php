@extends('layouts.app')

@section('title', $title)

@section('content')

<form action="{{ route('home.consultar') }}" method="GET">
    @csrf

    <div class="input-group mb-3">
        @if($consultar)
        <input type="text" class="form-control" name="nome" value="{{ $nomeJogo }}">
        @else
        <input type="text" class="form-control" placeholder="Nome do Jogo" name="nome">
        @endif

        <!-- Adicionando o campo de seleção para jogo finalizado -->
        <select class="form-select" name="jogo_finalizado">
            @if(isset($jogoFinalizado))
            <option value="1" {{ $jogoFinalizado==1 ? 'selected' : '' }}>Sim</option>
            <option value="0" {{ $jogoFinalizado==0 ? 'selected' : '' }}>Não</option>
            @else
            <option value="null" disabled selected hidden>Jogo Finalizado Selecionar Sim ou Não</option>
            <option value="1">Sim</option>
            <option value="0">Não</option>
            @endif
        </select>

        <!-- Adicionando o campo de seleção para as plataformas -->
        <select class="form-select" name="plataforma_id" aria-label="Plataformas">
            <option value="null" disabled selected hidden>Selecionar uma Plataforma</option>
            @foreach($plataformas as $plataforma)

            @if($plataforma->id == $plataformaId)
            <option selected value="{{ $plataforma->id }}">{{ $plataforma->nome }}</option>
            @endif

            <option value="{{ $plataforma->id }}">{{ $plataforma->nome }}</option>
            @endforeach
        </select>

        <button class="btn btn-success" type="submit">Consultar</button>
        
        @if($consultar)
          <a href="{{ route('home.index') }}" class="btn btn-secondary mx-1">Limpar</a>
        @endif

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
            <th>Jogo</th>
            <th>Finalizado</th>
            <th>Plataforma</th>
            <!-- Adicione outras colunas conforme necessário -->
        </tr>
    </thead>
    <tbody>
        @foreach($jogos as $jogo)
        <tr>
            <td>{{ $jogo->nome_jogo }}</td>
            <td>{{ $jogo->jogo_finalizado }}</td>
            <td>{{ $jogo->nome_plataforma }}</td>

            <!-- Adicione outras colunas conforme necessário -->
        </tr>
        @endforeach

    </tbody>
</table>

@endif

@endsection