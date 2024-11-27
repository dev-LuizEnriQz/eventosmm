<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <nav class="navbar navbar-expand-lg" style="background: #babbbc">
        <div class="container-fluid">
            <div class="flex">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('dashboard') }}">Eventos M&M
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!--CLIENTES-->
                    <li class="nav-item nav-underline">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#clientsMenu" aria-expanded="false">Clientes</a>
                        <div class="collapse" id="clientsMenu">
                        <!--Submenu de Clientes-->
                            <ul class="dropdown-menu" id="clientsMenu">
                                <li><a class="dropdown-item" href="{{route('clients.index')}}">Consulta Clientes</a></li>
                                <li><a class="dropdown-item" href="{{ route('clients.registrarCliente') }}">Registrar Cliente</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item nav-underline">
                        <a class="nav-link" href="#">Cotizar</a>
                    </li>
                    <li class="nav-item nav-underline">
                        <a class="nav-link" href="#">Agenda</a>
                    </li>
                    <li class="nav-item nav-underline">
                        <a class="nav-link" href="#">Depositos</a>
                    </li>
                    <li class="nav-item nav-underline">
                        <a class="nav-link" href="#">Proximos eventos</a>
                    </li>
                </ul>

                <!--Navbar dropdown Perfíl-->
                <ul class="nav-item dropdown mb-1">
                    @guest
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Inicio de Sesión / Registro
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('login')}}">Inicio de Sesión</a></li>
                        </ul>
                    @else
                        <ul class="nav-item dropdown-menu-end">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Bienvenido {{Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('profile.edit') }}">Perfil</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </ul>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</nav>
