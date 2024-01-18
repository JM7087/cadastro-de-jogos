@extends('layouts.app')

@section('title', $title )

@section('content')

<form action="{{ route('plataformas.update', ['id' => $plataforma->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="input-group mx-2 py-1">    
        <label class="form-label mx-2 py-1">Nome da Plataforma:</label>
        <input type="text" class="form-control" id="editNome" name="nome" value="{{ $plataforma->nome }}">
    </div>
    <!-- Adicione outros campos conforme necessário -->

     <!-- notificação -->
     @include('notificacaos')

     <center class="py-4">

    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('plataformas.index') }}" class="btn btn-danger">Cancelar</a>
    
    </center>

</form>

@endsection
