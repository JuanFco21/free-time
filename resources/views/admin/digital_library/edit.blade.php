@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Biblioteca Digital') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Actualizar artículo') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('digital_library.update', $digital_library->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12">
                            <label for="">{{ __('Titulo') }}</label>
                            <input type="text" class="form-control" name="title" value="{{ $digital_library->title }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        @php
                            $authors = json_decode($digital_library->authors);
                        @endphp

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="authors.*">Autor</label>
                            @if (is_array($authors))
                                @foreach ($authors as $author)
                                    <input type="text" name="authors[]" id="authors" class="form-control mb-2"
                                        value="{{ $author }}">
                                @endforeach
                            @else
                                <input type="text" name="authors[]" id="authors" class="form-control"
                                    value="{{ $digital_library->authors }}">
                            @endif
                            <button type="button" class="btn btn-primary btn-sm mt-2" id="add-author">
                                Agregar Autores
                            </button>
                            <div id="authors-list"></div>
                            @error('authors.*')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="">{{ __('Descripción') }}</label>
                            <textarea name="content" class="summernote-simple">{{ $digital_library->content }}</textarea>
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label class="">{{ __('Etiquetas') }}</label>
                            <input name="tags" type="text" class="form-control inputtags" value="{{ formatTags($digital_library->tags()->pluck('name')->toArray()) }}">
                            @error('tags')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="">{{ __('Imagen del artículo') }}</label>
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">{{ __('Sube una imagen') }}</label>
                                <input type="file" name="article_image" id="image-upload">
                            </div>
                            @error('article_image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="">{{ __('Archivo del artículo') }}</label>
                            <input type="file" name="article_file" class="form-control">
                            @error('article_file')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="">{{ __('Opinion de persona (Opcional)') }}</label>
                            <textarea name="people_opinion" class="summernote-simple">{{ $digital_library->people_opinion }}</textarea>
                            @error('people_opinion')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row col-lg-12 col-md-12">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="category">{{ __('Categoria') }}</label>
                                <select name="category" id="" class="select2 form-control">
                                    <option value="" disabled>
                                        {{ __('---Selecciona una opción---') }}
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $digital_library->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="status">{{ __('Estatus') }}</label>
                                <select name="status" id="" class="select2 form-control">
                                    <option value="" disabled>{{ __('---Selecciona una opción---') }}
                                    </option>
                                    @foreach (App\Enums\PublicationStatus::cases() as $status)
                                        <option value="{{ $status->value }}"
                                            {{ __('---Selecciona una opción---') }}
                                            {{ $digital_library->status == $status->value ? 'selected' : '' }}>
                                            {{ $status->value }} 
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>                  

                            <div class="form-group col-lg-6 col-md-6">
                                <label>{{ __('Fecha de publicación del artículo') }}</label>
                                <input type="text" name="publication_date" class="form-control datepicker"
                                    value="{{ $digital_library->publication_date }}">
                                @error('publication_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{ __('Año del artículo') }}</label>
                                <input type="text" class="form-control" name="article_year"
                                    value="{{ $digital_library->article_year }}">
                                @error('article_year')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{ __('Volumen del artículo') }}</label>
                                <input type="text" class="form-control" name="article_volume"
                                    value="{{ $digital_library->article_volume }}">
                                @error('article_volume')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{ __('Número de páginas del artículo') }}</label>
                                <input type="text" class="form-control" name="article_number_pages"
                                    value="{{ $digital_library->article_number_pages }}">
                                @error('article_number_pages')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{ __('Número del artículo') }}</label>
                                <input type="text" class="form-control" name="article_number"
                                    value="{{ $digital_library->article_number }}">
                                @error('article_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{ __('ISNN') }}</label>
                                <input type="text" class="form-control" name="isnn"
                                    value="{{ $digital_library->isnn }}">
                                @error('isnn')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('digital_library.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addAuthorButton = document.getElementById('add-author');
            const authorsList = document.getElementById('authors-list');

            addAuthorButton.addEventListener('click', function() {
                const input = document.createElement('input');
                input.type = 'text';
                input.name = 'authors[]';
                input.className = 'form-control mt-2';
                input.placeholder = 'Ingrese el nombre del autor';
                authorsList.appendChild(input);
            });

            const form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
                const authorInputs = document.querySelectorAll('input[name="authors[]"]');
                const serializedAuthors = Array.from(authorInputs).map(input => input.value);
                document.querySelector('input[name="authors"]').value = JSON.stringify(serializedAuthors);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                "background-image": "url({{ asset($digital_library->article_image) }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        })
    </script>
@endpush
