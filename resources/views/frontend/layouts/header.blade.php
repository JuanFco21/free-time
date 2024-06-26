<!-- Header news -->
<header class="bg-light">
    <!-- Navbar  Top-->
    <div class="topbar d-none d-sm-block">
        <div class="container ">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <div class="topbar-left topbar-right d-flex">

                        <ul class="topbar-sosmed p-0">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                        <div class="topbar-text">
                            Domingo 22 de Octubre de 2023
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Navbar Top  -->
    <!-- Navbar  -->
    <!-- Navbar menu  -->
    <div class="navigation-wrap navigation-shadow bg-white">
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft">
            <div class="container">
                <div class="offcanvas-header">
                    <div data-toggle="modal" data-target="#modal_aside_right" class="btn-md">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                </div>
                <figure class="mt-2 mb-2 mx-auto">
                    <a href="{{ route('frontend.home') }}">
                        <img src="{{ asset('frontend/assets/img/logo-header.png') }}" alt="Logo Free Time"
                            class="img-fluid logo">
                    </a>
                </figure>
                <div class="collapse navbar-collapse justify-content-between" id="main_nav99">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('frontend.home') }}">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('frontend.about_us') }}"> Sobre Nosotros </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Adónde ir </a>
                            <ul class="dropdown-menu animate fade-up scrollable-dropdown">
                                <li>
                                    <input type="text" class="blog-search-box" id="blog-search-box"
                                        placeholder="Buscar">
                                </li>
                                <li class="blog-no-results" style="display: none;">No se encontraron resultados.
                                </li>
                                <li><a class="dropdown-item" href="404.html"> Reportaje </a></li>
                                <li><a class="dropdown-item" href="#">RESTAURANTES</a></li>
                                <li><a class="dropdown-item" href="videos.html">BARES Y CANTINAS</a></li>
                                <li><a class="dropdown-item" href="#">VILLAHERMOSA</a></li>
                                <li><a class="dropdown-item" href="#">ECOSISTEMA</a></li>
                                <li><a class="dropdown-item" href="#">SITIOS ARQUEOLÓGICOS</a></li>
                                <li><a class="dropdown-item" href="#">DANZAS PREHISPANICAS EN TABASCO</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown has-megamenu">
                            <a class="nav-link" href="articulos.html">Blog </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Biblioteca
                                Digital
                            </a>
                            <ul class="dropdown-menu animate fade-up scrollable-dropdown">
                                <li>
                                    <input type="text" class="library-search-box" id="library-search-box"
                                        placeholder="Buscar">
                                </li>
                                <li class="no-results" style="display: none;">No se encontraron resultados.</li>
                                @foreach ($digital_library_categories as $digital_library_category)
                                    <li><a class="dropdown-item"
                                            href="{{ route('frontend.digital_library', ['category' => $digital_library_category->slug]) }}">{{ $digital_library_category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link  text-dark" href="contact.html">Contactanos</a>
                        </li>
                    </ul>
                    <!-- Search bar.// -->
                    <ul class="navbar-nav ">
                        <li class="nav-item search hidden-xs hidden-sm "> <a class="nav-link" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- Search content bar.// -->
                    <div class="top-search navigation-shadow">
                        <div class="container">
                            <div class="input-group ">
                                <form action="#">

                                    <div class="row no-gutters mt-3">
                                        <div class="col">
                                            <input class="form-control border-secondary border-right-0 rounded-0"
                                                type="search" value="" placeholder="Buscar"
                                                id="example-search-input4">
                                        </div>
                                        <div class="col-auto">
                                            <a class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                                href="/search-result.html">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Search content bar.// -->
                </div> <!-- navbar-collapse.// -->
            </div>
        </nav>
    </div>
    <!-- End Navbar menu  -->

    <!-- Navbar sidebar menu  -->
    <div id="modal_aside_right" class="modal fixed-left fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-aside" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="widget__form-search-bar">
                        <div class="row no-gutters">
                            <div class="col">
                                <input class="form-control border-secondary border-right-0 rounded-0" value=""
                                    placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav class="list-group list-group-flush">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link active text-dark" href="{{ route('frontend.home') }}"> Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('frontend.about_us') }}"> Sobre Nosotros </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown">Adónde ir
                                </a>
                                <ul class="dropdown-menu animate fade-up scrollable-dropdown">
                                    <li>
                                        <input type="text" class="blog-search-box" id="blog-search-box"
                                            placeholder="Buscar">
                                    </li>
                                    <li class="blog-no-results" style="display: none;">No se encontraron resultados.
                                    </li>
                                    <li><a class="dropdown-item" href="404.html"> Reportaje </a></li>
                                    <li><a class="dropdown-item" href="#">RESTAURANTES</a></li>
                                    <li><a class="dropdown-item" href="videos.html">BARES Y CANTINAS</a></li>
                                    <li><a class="dropdown-item" href="#">VILLAHERMOSA</a></li>
                                    <li><a class="dropdown-item" href="#">ECOSISTEMA</a></li>
                                    <li><a class="dropdown-item" href="#">SITIOS ARQUEOLÓGICOS</a></li>
                                    <li><a class="dropdown-item" href="#">DANZAS PREHISPANICAS EN TABASCO</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown has-megamenu">
                                <a class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    Biblioteca Digital
                                </a>
                                <ul class="dropdown-menu animate fade-up scrollable-dropdown">
                                    <li>
                                        <input type="text" class="library-search-box" id="library-search-box"
                                            placeholder="Buscar">
                                    </li>
                                    <li class="no-results" style="display: none;">No se encontraron resultados.</li>
                                    @foreach ($digital_library_categories as $digital_library_category)
                                        <li><a class="dropdown-item"
                                                href="{{ route('frontend.digital_library', ['category' => $digital_library_category->slug]) }}">{{ $digital_library_category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link  text-dark" href="contact.html">Contactanos
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="modal-footer">
                    <p>© 2020 <a href="#">Free Time</a>
                        -
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, neque. &amp;
                        by <a href="#">Free Time.com</a></p>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header news -->
