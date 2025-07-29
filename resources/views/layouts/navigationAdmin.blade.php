<!-- Primary Navigation Menu -->
    <nav class="navbar navbar-expand-lg" style="background: #ced4da">
        <div class="container-fluid">
            <!-- Navbar Links-->
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!--CLIENTES-->
                    <li class="nav-item dropdown nav-underline">
                        <a class="nav-link" href="#" id="clientsDropdown" role="button">Clientes</a>
                        <ul class="dropdown-menu" aria-labelledby="clientsDropdown">
                            <li><a class="dropdown-item" href="{{route('clients.index')}}">Consulta Clientes</a></li>
                            <li><a class="dropdown-item" href="{{ route('clients.registrarCliente') }}">Registrar Cliente</a></li>
                        </ul>
                    </li>

                    <!-- COTIZACIONES-->
                    <li class="nav-item dropdown nav-underline">
                        <a class="nav-link" href="#" id="quoteMenu" role="button">Cotizaciones</a>
                            <ul class="dropdown-menu" aria-labelledby="quoteMenu">
                                <li><a class="dropdown-item" href="{{route('quotes.index')}}">Consultar Cotización</a></li>
                                <li><a class="dropdown-item" href="{{route('quotes.registrarCotizacion')}}">Registrar Cotización</a></li>
                            </ul>
                    </li>

                    <!--DEPOSITOS-->
                    <li class="nav-item dropdown nav-underline">
                        <a class="nav-link" href="#" id="#depositsMenu" role="button">Depositos</a>
                            <ul class="dropdown-menu" aria-labelledby="depositsMenu">
                                <li><a class="dropdown-item" href="{{route('deposits.accounts.index')}}">Consultar Cuenta / Depositos</a></li>
                            </ul>
                    </li>

                    <!--CALENDARIO-->
                    <li class="nav-item nav-underline">
                        <a class="nav-link" href="{{route('calendar.index')}}">Agenda</a>
                    </li>

                </ul>
                <!-- End Navbar Dropdown Perfil-->
            </div>
            <!-- END Navbar LINKS -->
        </div>
    </nav>

<style>
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }
</style>
