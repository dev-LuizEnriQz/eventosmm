{{--
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
--}}
    <!-- Primary Navigation Menu -->
    <nav class="navbar navbar-expand-lg" style="background: #babbbc">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="flex">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{asset('storage/images/logo_mm.svg')}}" alt="Logo" width="100" height="50" class="rounded-circle me-2"/>
                </a>
            </div>
            <!--Toggler Button para Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links-->
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="container-fluid navbar-nav me-auto mb-2 mb-lg-0">

                    <!--NOSOTROS-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#clientsMenu" aria-expanded="false">Nosotros</a>
                    </li>

                    <!-- SERVICIOS-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#quoteMenu" aria-expanded="false">Servicios</a>
                    </li>

                    <!--TESTIMONIOS-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#depositsMenu" aria-expanded="false">Testimonios</a>
                    </li>

                    <!--BLOG-->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>

                </ul>

                <!--Navbar dropdown Perfíl-->
                <ul class="navbar-nav ms-auto">
                    @guest
                    <li class="nav-item dropdown nav-underline">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#authDropdown" aria-expanded="false">
                            <!--Inicio de Sesión / Registro-->
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
{{--
</nav>
--}}
