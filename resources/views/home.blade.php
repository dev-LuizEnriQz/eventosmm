<x-app-layout>
    <x-slot name="header">

    </x-slot>


    @include('home.hero')
    @include('home.nosotros')
    @include('home.galeria')

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif
</x-app-layout>
