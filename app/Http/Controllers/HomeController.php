<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            //Agregamos un mensaje flash a la sesión
            session()->flash('status', 'Bienvenido de nuevo,' . Auth::user()->first_name . '!');

            //Si el usuartio ya esta autentificado, lo redireccionara al Dashboard
            return redirect()->route('dashboard');
        }

        //Si no ha iniciado sesión, muestra la pagina publica
        return view('home');
    }
}
