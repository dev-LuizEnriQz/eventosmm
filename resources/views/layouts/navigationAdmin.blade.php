<!-- Primary Navigation Menu -->
    <nav class="navbar navbar-expand-lg" style="background: #ced4da">
        <div class="container-fluid">
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
                <!-- End Navbar Dropdown Perfil-->
            </div>
            <!-- END Navbar LINKS -->
        </div>
    </nav>

