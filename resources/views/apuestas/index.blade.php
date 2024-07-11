@extends('layouts.app')
@section('content')
<h1>Lista de Apuestas</h1>
<form action="{{ url('/apuestas/search') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="juego" class="form-control" placeholder="Buscar por nombre del juego">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </div>
</form>
<div class="container mt-5">
    <h1 class="mb-4">Lista de Apuestas</h1>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Juego</th>
                <th>Cantidad de Jugadores</th>
                <th>Juego de Cartas</th>
                <th>Fecha de Apuesta</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apuestas as $apuesta)
                <tr>
                    <td>{{ $apuesta->id }}</td>
                    <td>{{ $apuesta->juego->nombre }}</td>
                    <td>{{ $apuesta->juego->cantidad_jugadores }}</td>
                    <td>{{ $apuesta->juego->juego_de_cartas ? 'Sí' : 'No' }}</td>
                    <td>{{ $apuesta->fecha }}</td>
                    <td>{{ $apuesta->monto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection