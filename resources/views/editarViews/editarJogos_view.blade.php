@extends('layouts.app')

@section('title', $title )

@section('content')

<form action="{{ route('jogos.update', ['id' => $jogo->jogo_id]) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="input-group mx-2 py-1">    
            <label class="form-label mx-2 py-1">Nome do Jogo:</label>
            <input type="text" class="form-control" id="editNome"  placeholder="Nome do Jogo" name="nome" value="{{ $jogo->nome_jogo }}">
        <!-- Adicione outros campos conforme necessário -->

        <!-- Adicionando o campo de seleção para jogo finalizado -->
        <label class="form-label mx-2 py-1">Jogo Finalizado:</label>
        <select class="form-select" name="jogo_finalizado">
            @if($jogo->jogo_finalizado == 1)
            <option value="1" selected>Sim</option>
            <option value="0">Não</option>

            @else
            <option value="1">Sim</option>
            <option value="0" selected>Não</option>
            @endif
        </select>

         <!-- Adicionando o campo de seleção para as categorias -->
         <label class="form-label mx-2 py-1">Categoria:</label>
         <select class="form-select" name="categoria_id" aria-label="Categoria">
            <option value="null" disabled selected hidden>Selecionar uma Categoria</option>
            @foreach($categorias as $categoria)

            @if($categoria->id == $jogo->categoria_id)
            <option selected hidden value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endif

            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
        </select>

        <!-- Adicionando o campo de seleção para as plataformas -->
        <label class="form-label mx-2 py-1">Plataforma:</label>
        <select class="form-select" name="plataforma_id" aria-label="Plataformas">
            @foreach($plataformas as $plataforma)
            @if($plataforma->id == $jogo->plataforma_id)
            <option selected hidden value="{{ $plataforma->id }}">{{ $plataforma->nome }}</option>
            @endif
            <option value="{{ $plataforma->id }}">{{ $plataforma->nome }}</option>
            @endforeach
        </select>
    
    </div>

     <!-- notificação -->
     @include('notificacaos')

     <center class="py-4">

    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('jogos.index') }}" class="btn btn-danger">Cancelar</a>

     </center>
</form>

@endsection
