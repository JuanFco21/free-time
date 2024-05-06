@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Biblioteca Digital') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Crear nuevo artículo') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('digital_library.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12">
                            <label for="">{{ __('Titulo') }}</label>
                            <input type="text" class="form-control" name="title">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="authors.*">Autor</label>
                            <input type="text" name="authors[]" id="authors" class="form-control">
                            <button type="button" class="btn btn-primary btn-sm mt-2" id="add-author">Agregar
                                Autores</button>
                            <div id="authors-list"></div>
                            @error('authors.*')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="">{{ __('Descripción') }}</label>
                            <textarea name="content" class="summernote-simple"></textarea>
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label class="">{{ __('Etiquetas') }}</label>
                            <input name="tags" type="text" class="form-control inputtags">
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
                            <textarea name="people_opinion" class="summernote-simple"></textarea>
                            @error('people_opinion')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row col-lg-12 col-md-12">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="digital_library_category">{{ __('Categoria') }}</label>
                                <select name="digital_library_category" id="" class="select2 form-control">
                                    <option value="" selected="" disabled>
                                        {{ __('---Selecciona una opción---') }}
                                    </option>
                                    @foreach ($digital_library_categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('digital_library_category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="status">{{ __('Estatus') }}</label>
                                <select name="status" id="" class="select2 form-control">
                                    <option value="" selected="" disabled>
                                        {{ __('---Selecciona una opción---') }}
                                    </option>
                                    @foreach (App\Enums\PublicationStatus::cases() as $publicationStatus)
                                        <option value="{{ $publicationStatus->value }}">{{ $publicationStatus->value }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label>{{ __('Fecha de publicación del artículo') }}</label>
                                <input type="text" name="publication_date" class="form-control datepicker">
                                @error('publication_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{ __('Año del artículo') }}</label>
                                <input type="text" class="form-control" name="article_year">
                                @error('article_year')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{ __('Volumen del artículo') }}</label>
                                <input type="text" class="form-control" name="article_volume">
                                @error('article_volume')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{ __('Número de páginas del artículo') }}</label>
                                <input type="text" class="form-control" name="article_number_pages">
                                @error('article_number_pages')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{ __('Número del artículo') }}</label>
                                <input type="text" class="form-control" name="article_number">
                                @error('article_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{ __('ISNN') }}</label>
                                <input type="text" class="form-control" name="isnn">
                                @error('isnn')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('digital_library.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
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
@endpush
