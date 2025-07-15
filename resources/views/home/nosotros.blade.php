<section class="nosotros-section container my-5 py-5">
    <div class="row">
        <!-- Columna Izquierda Informativa -->
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h2>Creamos momentos Inolvidables</h2>
            <p>Eventos M&M nos comprometemos en cada evento</p>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <p>Ceremonias</p>
                    <p>Graduaciones</p>
                    <p>Eventos Empresariales</p>
                </div>
                <div class="col-md-3">
                    <p>Bodas</p>
                    <p>XV aňos</p>
                    <p>Aniversarios</p>
                </div>
            </div>
        </div>
        <!-- Columna Derecha Carrusel -->
        <div class="col-md-6">
            <div id="nosotrosCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner rounded-4 shadow-lg">
                    <div class="carousel-item active">
                        <img src="{{ asset('/images/boda.jpg')}}" class="d-block w-100" alt="slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/images/carousel1.jpg') }}" class="d-block w-100" alt="slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/images/carousel2.jpg') }}" class="d-block w-100" alt="slide 3">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/images/carousel3.jpg') }}" class="d-block w-100" alt="slide 4">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/images/carousel4.jpg') }}" class="d-block w-100" alt="slide 5">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/images/carousel5.jpg') }}" class="d-block w-100" alt="slide 6">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/images/carousel6.jpg') }}" class="d-block w-100" alt="slide 7">
                    </div>
                </div>
                <!-- Controles -->
                <button class="carousel-control-prev" type="button" data-bs-target="#nosotrosCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#nosotrosCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>

                <!-- Indicadores -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#nosotrosCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
                    <button type="button" data-bs-target="#nosotrosCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#nosotrosCarousel" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#nosotrosCarousel" data-bs-slide-to="3"></button>
                    <button type="button" data-bs-target="#nosotrosCarousel" data-bs-slide-to="4"></button>
                    <button type="button" data-bs-target="#nosotrosCarousel" data-bs-slide-to="5"></button>
                    <button type="button" data-bs-target="#nosotrosCarousel" data-bs-slide-to="6"></button>
                </div>
            </div>
        </div>
    </div>
</section>
