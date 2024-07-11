@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Comparar Apuestas de Juegos de Cartas vs No Cartas</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h3>Total Apuestas en Juegos de Cartas: ${{ number_format($totalCartas, 2) }}</h3>
            <h3>Total Apuestas en Juegos que No Son de Cartas: ${{ number_format($totalNoCartas, 2) }}</h3>
        </div>
    </div>

    <div class="alert {{ $isTotalCartasGreater ? 'alert-success' : 'alert-danger' }}">
        {{ $isTotalCartasGreater ? 'El dinero total de las apuestas en juegos de cartas es mayor.' : 'El dinero total de las apuestas en juegos que no son de cartas es mayor.' }}
    </div>

    <a href="{{ url('/apuestas') }}" class="btn btn-primary">Volver a la Lista de Apuestas</a>
</div>
@endsection