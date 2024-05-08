<div class="container">
    <div class="row">
        <div class="col-md-12">
            <aside class="wrapper__list__article">
                <h4 class="border_section">Biblioteca Digital</h4>
            </aside>
        </div>
        <div class="col-md-12">
            <div class="article__entry-carousel">
                @foreach ($digital_libraries_carousel as $carousel)
                <div class="item">
                    <!-- Post Article -->
                    <div class="article__entry">
                        <div class="article__image">
                            <a
                                href="{{ route('frontend.digital_library_detail', ['category' => $carousel->category->slug, 'publication' => $carousel->slug]) }}">
                                <img src="{{ asset($carousel->article_image) }}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="article__content text-center">
                            <h6>{{ $carousel->title }}</h6>
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
</div>
