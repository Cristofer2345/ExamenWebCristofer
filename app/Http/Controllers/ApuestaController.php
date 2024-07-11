<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apuesta;
use App\Models\Juego;

class ApuestaController extends Controller
{
    public function index()
    {
        $apuestas = Apuesta::whereHas('juego', function ($query) {
            $query->where('cantidad_jugadores', '>', 3);
        })->with('juego')->get();
        return view('apuestas.index', compact('apuestas'));
    }
    public function search(Request $request)
    {
        $juegoNombre = $request->input('juego');
        $apuestas = Apuesta::whereHas('juego', function ($query) use ($juegoNombre) {
            $query->where('nombre', 'like', "%{$juegoNombre}%");
        })->with('juego')->get();

        return view('apuestas.index', compact('apuestas'));
    }
     public function create()
    {
        $juegos = Juego::all();
        return view('apuestas.create', compact('juegos'));
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'juego_id' => 'required|exists:juegos,id',
        'fecha' => 'required|date',
        'monto' => 'required|integer',
    ]);

    Apuesta::create($validated);

    return redirect('/apuestas')->with('success', 'Apuesta creada exitosamente.');
}
public function compareBets()
{
    $totalCartas = Apuesta::whereHas('juego', function ($query) {
        $query->where('juego_de_cartas', true);
    })->sum('monto');

    $totalNoCartas = Apuesta::whereHas('juego', function ($query) {
        $query->where('juego_de_cartas', false);
    })->sum('monto');

    $isTotalCartasGreater = $totalCartas > $totalNoCartas;

    return view('apuestas.compare', compact('totalCartas', 'totalNoCartas', 'isTotalCartasGreater'));
}
}
