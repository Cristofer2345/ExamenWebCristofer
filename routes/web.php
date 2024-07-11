<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApuestaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/apuestas', [ApuestaController::class, 'index']);
Route::get('/apuestas/create', [ApuestaController::class, 'create']);
Route::post('/apuestas', [ApuestaController::class, 'store']);
Route::get('/apuestas/search', [ApuestaController::class, 'search']);
Route::get('/apuestas/compare', [ApuestaController::class, 'compareBets']);