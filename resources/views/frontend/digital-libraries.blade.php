@extends('frontend.layouts.master')

@section('home')
    <section class="blog_pages">
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
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog_page_search">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-10">
                                    <input type="text" placeholder="">
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit">buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <aside class="wrapper__list__article">
                        <h4 class="border_section">{{ $digital_library_slug->name }}</h4>
                    </aside>
                    <div class="container">
                        <div class="row">
                            <div class="revista__dialogos">
                                <!-- article card -->
                                @foreach ($digital_libraries as $digital_library)
                                    <div class="revista__dialogos-presentation">
                                        <img class="revista__dialogos-card"
                                            src="{{ asset($digital_library->article_image) }}" alt="Biblioteca Digital"
                                            style="width: 30rem; height: 26rem;">
                                        <div class="article__entry">
                                            <div class="article__content text-center">
                                                <h5>
                                                    {{ $digital_library->title }}
                                                </h5>
                                                <ul class="list-inline mb-4">
                                                    <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            Autores:
                                                            {{ implode(', ', json_decode($digital_library->authors)) }}
                                                        </span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span class="text-dark text-capitalize">
                                                            Fecha de publicación:
                                                            {{ \Carbon\Carbon::parse($digital_library->publication_date)->formatLocalized('%d de %B de %Y') }}
                                                        </span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-tags"></i>
                                                        <span class="text-dark text-capitalize"
                                                            style="text-decoration: none;">
                                                            {{ implode(', ', $digital_library->tags->pluck('name')->toArray()) }}
                                                        </span>
                                                    </li>
                                                </ul>
                                                <a href="{{ route('frontend.digital_library_detail', ['category' => $digital_library_slug->slug, 'publication' => $digital_library->slug]) }}"
                                                    class="btn btn-outline-primary mb-4 text-capitalize"> ver mas</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- end article card -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- Pagination -->
            <div class="pagination-area">
                <div class="pagination wow fadeIn animated" data-wow-duration="2s" data-wow-delay="0.5s">
                    @if ($digital_libraries->currentPage() > 1)
                        <a href="{{ $digital_libraries->url($digital_libraries->currentPage() - 1) }}" rel="prev">«</a>
                    @else
                    @endif

                    @for ($i = 1; $i <= $digital_libraries->lastPage(); $i++)
                        <a href="{{ $digital_libraries->url($i) }}"
                            class="{{ $digital_libraries->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                    @endfor

                    @if ($digital_libraries->hasMorePages())
                        <a href="{{ $digital_libraries->nextPageUrl() }}" rel="next">»</a>
                    @else
                    @endif
                </div>
            </div>
        </div>
        <div class="large_add_banner mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="large_add_banner_img">
                            <img src="images/12421730668337893628.jfif" alt="adds">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
