<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\CalendarController;
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

//Rutas relacionadas con el Modelo Clients

Route::middleware(['auth','verified'])->prefix('clients')->name('clients.')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index'); // Lista de clientes
    Route::get('registrarCliente', [ClientController::class, 'create'])->name('registrarCliente'); // Formulario para crear cliente
    Route::post('/', [ClientController::class, 'store'])->name('store'); // Guardar cliente
    Route::get('{id}/edit', [ClientController::class, 'edit'])->name('edit'); // Formulario para editar cliente
    Route::patch('{id}', [ClientController::class, 'update'])->name('update'); // Actualizar cliente
    Route::patch('{id}/deactivate', [ClientController::class, 'deactivate'])->name('deactivate'); // Desactivar cliente

    //Ruta de DATA TABLE
    Route::get('/api/clients', [ClientController::class, 'getClientsData'])->name('clients.api');
    //Ruta de BUSQUEDA EN VIVO CLIENTES
    Route::get('/search', [ClientController::class, 'search'])->name('clients.search');
});

//Rutas relacionadas con el Modelo Quote (Cotizaciones)

Route::middleware(['auth','verified'])->prefix('quotes')->name('quotes.')->group(function () {
    Route::get('/', [QuoteController::class, 'index'])->name('index');
    Route::get('registrarCotizacion', [QuoteController::class, 'create'])->name('registrarCotizacion');
    Route::post('/', [QuoteController::class, 'store'])->name('store');
    Route::get('{quote}/edit', [QuoteController::class, 'edit'])->name('edit');
    Route::patch('{id}', [QuoteController::class, 'update'])->name('update');
    Route::patch('{id}/deactivate', [QuoteController::class, 'deactivate'])->name('deactivate');

    //Ruta de DATA TABLE
    Route::get('/api/quotes', [QuoteController::class, 'getQuotesData'])->name('quotes.api');
    //Ruta de BUSQUEDA EN VIVO DE COTIZACIONES
    Route::get('/search', [QuoteController::class, 'search'])->name('quotes.search');

    //Ruta TEMPORAL para migrar cotizacion a Evento
    Route::get('/migrate-quotes-events', [QuoteController::class, 'migrateQuotesToEvents']);
});

//Rutas relacionadas con el Modelo Event (Eventos)
Route::middleware(['auth','verified'])->prefix('events')->name('events.')->group(function () {
    Route::get('/', [QuoteController::class, 'index'])->name('index');
    Route::get('registrarEventos', [QuoteController::class, 'create'])->name('registrarEventos');
    Route::post('/', [QuoteController::class, 'store'])->name('store');
    Route::get('{id}/edit', [QuoteController::class, 'edit'])->name('edit');
    Route::patch('{id}', [QuoteController::class, 'update'])->name('update');
    Route::patch('{id}/deactivate', [QuoteController::class, 'deactivate'])->name('deactivate');
});

//Rutas FULLCALENDAR (Visualizacion de eventos)
Route::middleware(['auth','verified'])->prefix('calendar')->name('calendar.')->group(function () {
    Route::get('/', [CalendarController::class, 'index'])->name('index');
    Route::get('/api/events', [CalendarController::class, 'getEvents'])->name('events.api');
});

require __DIR__.'/auth.php';
