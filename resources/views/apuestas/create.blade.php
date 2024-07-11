@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Crear Apuesta</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/apuestas') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="juego_id">Juego</label>
                    <select name="juego_id" id="juego_id" class="form-control" required>
                        <option value="">Seleccione un juego</option>
                        @foreach($juegos as $juego)
                            <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="datetime-local" name="fecha" id="fecha" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="number" name="monto" id="monto" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Crear Apuesta</button>
            </form>
        </div>
    </div>
</div>
@endsection