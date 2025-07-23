<section class="nosotros-section container my-5 py-5">
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <div class="row">
            <!-- Columna Izquierda Informativa -->
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <h2 class="titulo-decorado">CREAMOS MOMENTOS INOLVIDABLES</h2>
                <p>Eventos M&M nos comprometemos en cada evento</p>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <p class="categoria">Ceremonias</p>
                        <p class="categoria">Graduaciones</p>
                        <p class="categoria">Eventos Empresariales</p>
                    </div>
                    <div class="col-md-6">
                        <p class="categoria">Bodas</p>
                        <p class="categoria">XV aňos</p>
                        <p class="categoria">Aniversarios</p>
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
        <!-- Seccion de Nosotros Slider Parallax -->
        <div class="row py-5">
            <div class="col-md-12 d-flex flex-column justify-content-center">
                <h2 class="titulo-decorado">CREAMOS Y PRESERVAMOS EXPERIENCIAS HEMROSAS Y DURADERAS</h2>
            </div>
        </div>
        <div class="swiper swiper-parallax shadow-lg rounded-4 overflow-hidden" style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff">
            <div class="parallax-bg" style="background-image: url({{asset('/images/galleryCeremony/crmny7.jpg')}});" data-swiper-parallax="-23%"></div>
            <!-- Parallax -->
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide-content">
                        <div class="title" data-swiper-parallax="-300">Misión</div>
                        <!--<div class="subtitle" data-swiper-parallax="-200">Subtitle</div>-->
                        <div class="text" data-swiper-parallax="-100">
                            <p>
                                En Eventos M&M, nuestra misión es convertir cada celebración en un recuerdo
                                imborrable. Nos dedicamos a crear experiencias únicas, diseñadas con detalle,
                                pasión y compromiso, porque entendemos que cada evento es un capítulo especial
                                en la vida de nuestros clientes. Trabajamos con esmero para superar expectativas
                                y garantizar la satisfacción total, cuidando cada instante para que cada
                                celebración sea tan inolvidable como merece.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-content">
                        <div class="title" data-swiper-parallax="-300">Visión</div>
                        <!--<div class="subtitle" data-swiper-parallax="-200">Subtitle</div>-->
                        <div class="text" data-swiper-parallax="-100">
                            <p>
                                Aspiramos a ser la empresa referente en la organización de eventos memorables
                                en la región, destacándonos por la innovación, la excelencia en el servicio y
                                la personalización de cada experiencia. Queremos seguir creciendo, acompañando
                                a más familias, empresas y comunidades en la creación de momentos que trascienden
                                el tiempo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-content">
                        <div class="title" data-swiper-parallax="-300">Valores</div>
                        <!--<div class="subtitle" data-swiper-parallax="-200">Subtitle</div>-->
                        <div class="text" data-swiper-parallax="-100">
                            <p>
                                Nos guiamos por la pasión por el detalle, el compromiso absoluto con nuestros
                                clientes, la responsabilidad en cada acción que emprendemos y la confianza que
                                depositan en nosotros. En cada evento que organizamos, ponemos el corazón,
                                porque sabemos que detrás de cada fecha especial hay sueños, ilusiones y
                                emociones que merecen ser celebradas con perfección.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Botones de Navegacion y Paginación -->
            <div class="swiper-button-next parallax-next"></div>
            <div class="swiper-button-prev parallax-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    @vite(['resources/js/app.js','resources/js/custom/swiper/nosotrosHome.js'])
</section>
