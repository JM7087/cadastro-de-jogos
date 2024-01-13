@extends('layouts.app')

@section('title', $title )

@section('content')

<form action="{{ route('plataformas.update', ['id' => $plataforma->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="editNome" class="form-label">Nome da Plataforma</label>
        <input type="text" class="form-control" id="editNome" name="nome" value="{{ $plataforma->nome }}">
    </div>
    <!-- Adicione outros campos conforme necessário -->

     <!-- notificação de erro -->
     @error('nome')
     <div class="alert alert-danger" id="error-message">{{ $message }}</div>
     @enderror

    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('plataformas.index') }}" class="btn btn-danger">Cancelar</a>
</form>

@endsection
