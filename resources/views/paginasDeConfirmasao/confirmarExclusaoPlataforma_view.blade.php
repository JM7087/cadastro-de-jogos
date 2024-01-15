@extends('layouts.app')

@section('title', $title )

@section('content')

<div class="d-flex justify-content-center align-items-center py-5">
    <form action="{{ route('plataformas.destroy', ['id' => $plataforma->id]) }}" method="POST">
        @csrf
        @method('DELETE')

        <h2> {{ $mensagemDeConfimasao }} </h2>

        <!-- notificação de erro -->
        @error('nome')
        <div class="alert alert-danger" id="error-message">{{ $message }}</div>
        @enderror

        <center class="py-4">

            @if($disabled)
            <button type="submit" class="btn btn-secondary" disabled >Confirmar</button>
            @else
            <button type="submit" class="btn btn-success">Confirmar</button>
            @endif

        <a href="{{ route('plataformas.index') }}" class="btn btn-danger">Cancelar</a>

        </center>

    </form>
</div>

@endsection
