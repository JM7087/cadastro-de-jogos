@extends('layouts.app')

@section('title', $title )

@section('content')

<div class="d-flex justify-content-center align-items-center py-5">
    <form action="{{ route('jogos.destroy', ['id' => $jogo->id]) }}" method="POST">
        @csrf
        @method('DELETE')

        <h2> {{ $mensagemDeConfimasao }} </h2>

        <center class="py-4">

            <button type="submit" class="btn btn-success">Confirmar</button>
            <a href="{{ route('jogos.index') }}" class="btn btn-danger">Cancelar</a>

        </center>

    </form>
</div>

@endsection