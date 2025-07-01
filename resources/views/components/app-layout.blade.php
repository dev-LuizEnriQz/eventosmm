<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'Eventos M&M' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Fonts Icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="d-flex flex-column h-100 font-sans antialiased bg-gray-100 dark:bg-gray-900">

        @include('layouts.navigation')

        @if (Auth::check() && Auth::User()->role == 'admin')
            @include('layouts.navigationAdmin')
        @endif


       {{-- @auth
            <div class="alert alert-info">
                <strong>Usuario logueado:</strong> {{ Auth::user()->name }} <br>
                <strong>Rol:</strong> {{ Auth::user()->role }}
            </div>
        @endauth--}}

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="flex-grow-1">
            {{ $slot }}
        </main>

        @include('layouts.footer')

    </body>
</html>
