<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/clientes', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clientes/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clientes', [ClientController::class, 'store'])->name('clients.store');

    Route::get('/buscar/cep', [UtilController::class, 'buscarCep'])->name('buscar_cep');
    Route::get('/cidades/{state}', [UtilController::class, 'cities'])->name('get.cities');
});

require __DIR__.'/auth.php';
