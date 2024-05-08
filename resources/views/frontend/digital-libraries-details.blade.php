@extends('frontend.layouts.master')

@section('home')
    <section class="pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Breadcrumb -->
                    <ul class=" mb-4">
                        <li class="breadcrumbs__item">
                            <a href="{{ route('frontend.home') }}" class="breadcrumbs__url">
                                <i class="fa fa-home"></i> Inicio</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a href="#" class="breadcrumbs__url">Biblioteca Digital</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a href="{{ route('frontend.digital_library', ['category' => $digital_library_slug->slug]) }}"
                                class="breadcrumbs__url">{{ $digital_library_slug->name }}</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a href="{{ route('frontend.digital_library_detail', ['category' => $digital_library_slug->slug, 'publication' => $digital_library->slug]) }}"
                                class="breadcrumbs__url">{{ $digital_library->title }}</a>
                        </li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
                <div class="col-md-8">
                    <!-- content article detail -->
                    <!-- Article Detail -->
                    <div class="wrap__article-detail">
                        <div class="wrap__article-detail-title">
                            <h1>{{ $digital_library->title }}</h1>
                            <div class="wrap__article-detail-info">
                                <ul class="list-inline d-flex flex-wrap justify-content-start">
                                    <li class="list-inline-item">
                                        Subido por
                                        <a>{{ $digital_library->administrator->name }}</a>
                                        el
                                        {{ \Carbon\Carbon::parse($digital_library->publication_date)->formatLocalized('%d de %B de %Y') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>

                        <div class="wrap__article-detail-content">
                            <div class="total-views">
                                <div class="total-views-read">
                                </div>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o facebook" href="#">
                                            <i class="fa fa-facebook-f"></i>
                                            <span>facebook</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o twitter" href="#">
                                            <i class="fa fa-twitter"></i>
                                            <span>twitter</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o instagram" href="#">
                                            <i class="fa fa-instagram"></i>
                                            <span>instagram</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <p class="has-drop-cap-fluid">{!! $digital_library->content !!}</p>

                            <h5>Opiniones de otras personas</h5>
                            <!-- Blockquote  -->
                            <blockquote class="block-quote">
                                {!! $digital_library->people_opinion !!}
                            </blockquote>
                            <!-- Blockquote -->
                        </div>
                    </div>
                    <!-- end content article detail -->

                    <!-- authors-->
                    <!-- Profile author -->
                    <div class="wrap__profile">
                        <div class="wrap__profile-author">
                            <figure>
                                <img class="img-fluid rounded-circle"
                                    src="{{ !$digital_library->administrator->image ? asset('storage/users-img/' . $digital_library->administrator->image) : asset('storage/users-img/avatar-5.png') }}"
                                    alt="Imagen de responsable" style="width: 14rem; height: 13rem;">
                            </figure>
                            <div class="wrap__profile-author-detail">
                                <div class="wrap__profile-author-detail-name">Subido por</div>
                                <h4>{{ $digital_library->administrator->name }}</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis laboriosam ad
                                    beatae itaque ea non
                                    placeat officia ipsum praesentium! Ullam?</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o facebook ">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o twitter ">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o instagram ">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o youtube ">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="small_add_banner mb-5 pb-4">
                        <div class="small_add_banner_img">
                            <img src="images/12421730668337893628.jfif" alt="adds">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="related-article">
                        <h4>
                            tambien te puede interesar
                        </h4>
                        <div class="article__entry-carousel-three">
                            @foreach ($digital_libraries_carousel as $carousel)
                                <div class="item">
                                    <!-- Post Article -->
                                    <div class="article__entry">
                                        <div class="article__image">
                                            <a
                                                href="{{ route('frontend.digital_library_detail', ['category' => $digital_library_slug->slug, 'publication' => $carousel->slug]) }}">
                                                <img src="{{ asset($carousel->article_image) }}" alt=""
                                                    class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="article__content text-center">
                                            <h5>{{ $carousel->title }}</h5>
                                            <ul class="list-inline mb-3">
                                                <li class="list-inline-item">
                                                    <span class="text-primary">
                                                        Autores: {{ implode(', ', json_decode($carousel->authors)) }}
                                                    </span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span class="text-dark text-capitalize">
                                                        Fecha de publicación: {{ $carousel->article_year }}
                                                    </span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-tags"></i>
                                                    <span class="text-dark text-capitalize" style="text-decoration: none;">
                                                        {{ implode(', ', $carousel->tags->pluck('name')->toArray()) }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sticky-top">
                        <aside class="wrapper__list__article">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <img class="digital-library-card" src="{{ asset($digital_library->article_image) }}"
                                    style="width: 30rem; height: 26rem;">
                            </div>
                            <div class="text-center">
                                @if ($digital_library->article_file)
                                    <a href="{{ asset($digital_library->article_file) }}"
                                        class="btn btn-outline-primary mb-4 text-capitalize" download>Descargar</a>
                                @else
                                    <a href="#" class="btn btn-outline-primary mb-4 text-capitalize"
                                        download>Descargar</a>
                                @endif
                            </div>
                            <h4 class="border_section">datos del articulo</h4>
                            <div class="article__content">
                                <ul class="list-inline mb-4">
                                    <li class="mb-3">
                                        <span class="text-primary">
                                            {{ $digital_library->title }}
                                        </span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="text-primary">
                                            Autores: {{ implode(', ', json_decode($digital_library->authors)) }}
                                        </span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="text-primary">
                                            Fecha de publicación:
                                            {{ \Carbon\Carbon::parse($digital_library->publication_date)->formatLocalized('%d de %B de %Y') }}
                                        </span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="text-primary">
                                            Año: {{ $digital_library->article_year }}
                                        </span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="text-primary">
                                            Volumen: {{ $digital_library->article_volume }}
                                        </span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="text-primary">
                                            Número de páginas: {{ $digital_library->article_number_pages }}
                                        </span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="text-primary">
                                            Número: {{ $digital_library->article_number }}
                                        </span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="text-primary">
                                            ISSN: {{ $digital_library->isnn }}
                                        </span>
                                    </li>

                                </ul>
                            </div>
                            <h4 class="border_section">etiquetas</h4>
                            <div class="blog-tags p-0">
                                <ul class="list-inline">
                                    @foreach ($digital_library->tags as $tag)
                                        <li class="list-inline-item">
                                            <a>{{ $tag->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                        <!-- social media -->
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">redes sociales</h4>
                            <!-- widget Social media -->
                            <div class="wrap__social__media">
                                <a href="#" target="_blank">
                                    <div class="social__media__widget facebook">
                                        <span class="social__media__widget-icon">
                                            <i class="fa fa-facebook"></i>
                                        </span>
                                        <span class="social__media__widget-counter">
                                            19,243 fans
                                        </span>
                                        <span class="social__media__widget-name">
                                            like
                                        </span>
                                    </div>
                                </a>
                                <a href="#" target="_blank">
                                    <div class="social__media__widget twitter">
                                        <span class="social__media__widget-icon">
                                            <i class="fa fa-twitter"></i>
                                        </span>
                                        <span class="social__media__widget-counter">
                                            2.076 followers
                                        </span>
                                        <span class="social__media__widget-name">
                                            follow
                                        </span>
                                    </div>
                                </a>
                                <a href="#" target="_blank">
                                    <div class="social__media__widget instagram">
                                        <span class="social__media__widget-icon">
                                            <i class="fa fa-instagram"></i>
                                        </span>
                                        <span class="social__media__widget-counter">
                                            2.076 followers
                                        </span>
                                        <span class="social__media__widget-name">
                                            follow
                                        </span>
                                    </div>
                                </a>
                                <a href="#" target="_blank">
                                    <div class="social__media__widget youtube">
                                        <span class="social__media__widget-icon">
                                            <i class="fa fa-youtube"></i>
                                        </span>
                                        <span class="social__media__widget-counter">
                                            15,200 followers
                                        </span>
                                        <span class="social__media__widget-name">
                                            subscribe
                                        </span>
                                    </div>
                                </a>

                            </div>
                        </aside>
                        <!-- End social media -->
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">Anuncios</h4>
                            <a href="#">
                                <figure>
                                    <img src="images/11263529676912602662.jfif" alt="" class="img-fluid">
                                </figure>
                            </a>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
