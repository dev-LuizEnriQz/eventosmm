<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <nav class="navbar navbar-expand-lg" style="background: #babbbc">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="flex">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <img src="{{asset('storage/images/logo_mm.svg')}}" alt="Logo" width="100" height="50" class="rounded-circle me-2"/>
                </a>
            </div>
            <!--Toggler Button para Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links-->
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!--CLIENTES-->
                    <li class="nav-item nav-underline">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#clientsMenu" aria-expanded="false">Clientes</a>
                        <div class="collapse" id="clientsMenu">
                            <ul class="dropdown-menu" id="clientsMenu">
                                <li><a class="dropdown-item" href="{{route('clients.index')}}">Consulta Clientes</a></li>
                                <li><a class="dropdown-item" href="{{ route('clients.registrarCliente') }}">Registrar Cliente</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- COTIZACIONES-->
                    <li class="nav-item nav-underline">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#quoteMenu" aria-expanded="false">Cotizaciones</a>
                        <div class="collapse" id="quoteMenu">
                            <ul class="dropdown-menu" id="quoteMenu">
                                <li><a class="dropdown-item" href="{{route('quotes.index')}}">Consultar Cotización</a></li>
                                <li><a class="dropdown-item" href="{{route('quotes.registrarCotizacion')}}">Registrar Cotización</a></li>
                            </ul>
                        </div>
                    </li>

                    <!--DEPOSITOS-->
                    <li class="nav-item nav-underline">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#depositsMenu" aria-expanded="false">Depositos</a>
                        <div class="collapse" id="depositsMenu">
                            <ul class="dropdown-menu" id="depositsMenu">
                                <li><a class="dropdown-item" href="{{route('deposits.accounts.index')}}">Consultar Cuenta / Depositos</a></li>
                            </ul>
                        </div>
                    </li>

                    <!--CALENDARIO-->
                    <li class="nav-item nav-underline">
                        <a class="nav-link" href="{{route('calendar.index')}}">Agenda</a>
                    </li>

                </ul>

                <!--Navbar dropdown Perfíl-->
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item dropdown nav-underline">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#authDropdown" aria-expanded="false">
                            Inicio de Sesión / Registro
                        </a>
                        <ul class="dropdown-menu" id="authDropdown">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Inicio de Sesión</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item dropdown nav-underline">
                        <!-- Este es el bloque donde ya un usuario está autenticado -->
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#userDropdown" aria-expanded="false">
                            Bienvenido {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" id="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>
                                <!-- El formulario de cierre de sesión no necesita ir dentro de un <ul> -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
                <!-- End Navbar Dropdown Perfil-->
            </div>
            <!-- END Navbar LINKS -->
        </div>
    </nav>
</nav>
