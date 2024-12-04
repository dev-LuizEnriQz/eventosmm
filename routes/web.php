<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

//Ruta de Inicio / Bienvenido
/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Pagina de Registrar clientes

Route::middleware(['auth','verified'])->prefix('clients')->name('clients.')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index'); // Lista de clientes
    Route::get('registrarCliente', [ClientController::class, 'create'])->name('registrarCliente'); // Formulario para crear cliente
    Route::post('/', [ClientController::class, 'store'])->name('store'); // Guardar cliente
    Route::get('{id}/edit', [ClientController::class, 'edit'])->name('edit'); // Formulario para editar cliente
    Route::put('{id}', [ClientController::class, 'update'])->name('update'); // Actualizar cliente
    Route::patch('{id}/deactivate', [ClientController::class, 'deactivate'])->name('deactivate'); // Desactivar cliente

    //Ruta de DATA TABLE
    Route::get('/api/clients', [ClientController::class, 'getClientsData'])->name('clients.api');
});

require __DIR__.'/auth.php';
