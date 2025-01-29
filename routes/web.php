<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DepositAccountController;
use App\Http\Controllers\DepositController;
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
    //Ruta de BUSQUEDA EN VIVO CLIENTES/COTIZACIONES para Registrar CUENTA DE DEPOSITO
    Route::get('/api/searchClientQuote', [QuoteController::class, 'searchClientQuote'])->name('quotes.search');
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

//Rutas DEPOSITOS
Route::middleware(['auth'])->prefix('deposits')->name('deposits.')->group(function () {
   //Rutas para cuentas de depositos
    Route::prefix('accounts')->name('accounts.')->group(function () {
        Route::get('/', [DepositAccountController::class, 'index'])->name('index');//deposits.accounts.index
        Route::get('/registrarCuentaDeposito', [DepositAccountController::class, 'create'])->name('registrarCuentaDeposito');//deposits.accounts.create
        Route::post('/', [DepositAccountController::class, 'store'])->name('store');//deposits.accounts.store
    });

    //Rutas para movimientos de depositos
    Route::prefix('movements')->name('movements.')->group(function () {
       Route::get('/', [DepositController::class, 'index'])->name('index');//deposits.movements.index
        Route::get('/create', [DepositController::class, 'create'])->name('create');//deposits.movements.create
        Route::post('/', [DepositController::class, 'store'])->name('store');//deposits.movements.store
    });
});

require __DIR__.'/auth.php';
