@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Administradores') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Crear Administrador') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="">{{ __('Nombre') }}</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="">{{ __('Apellidos') }}</label>
                            <input type="text" class="form-control" name="last_name">
                            @error('last_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="">{{ __('Correo Electrónico') }}</label>
                            <input type="text" class="form-control" name="email">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-3">
                            <label for="">{{ __('Contraseña') }}</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-3">
                            <label for="">{{ __('Confirmar Contraseña') }}</label>
                            <input type="password" class="form-control" name="password_confirmation">
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <label for="image-upload" id="image-label">{{ __('Sube una imagen de perfil') }}</label>
                        <div id="image-preview" class="image-preview mb-3">
                            <input type="file" name="image" id="image-upload">
                        </div>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-4">
                            <label for="gender">{{ __('Género') }}</label>
                            <select name="gender" id="" class="select2 form-control">
                                <option value="" selected="" disabled>{{ __('---Selecciona un género---') }}
                                </option>
                                @foreach (App\Enums\Gender::cases() as $gender)
                                    <option value="{{ $gender->value }}">{{ $gender->value }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-4">
                            <label for="role">{{ __('Rol') }}</label>
                            <select name="role[]" id="" class="select2 form-control">
                                <option value="" selected="" disabled>{{ __('---Selecciona un rol---') }}
                                </option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-4">
                            <label for="status">{{ __('Estatus') }}</label>
                            <select name="status" id="" class="select2 form-control">
                                <option value="" selected="" disabled>{{ __('---Selecciona una opción---') }}
                                </option>
                                @foreach (App\Enums\Status::cases() as $status)
                                    <option value="{{ $status->value }}">{{ $status->value }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <a href="{{ route('administrator.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
$(document).ready(function() {
    let imageUrl = "{{ asset('admin/assets/img/avatar/avatar-5.png') }}";

    function setDefaultImage() {
        let input = $('#image-upload');
        if (!input.val()) {
            $('.image-preview').css({
                "background-image": "url(" + imageUrl + ")",
                "background-size": "cover",
                "background-position": "center center"
            });
        }
    }

    setDefaultImage();

    $('#image-upload').on('change', function() {
        let input = $(this);
        let file = input[0].files[0];

        // Verificar si se seleccionó un archivo
        if (file) {
            // Verificar si el archivo es una imagen
            if (file.type.match('image.*')) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-preview').css({
                        "background-image": "url(" + e.target.result + ")",
                        "background-size": "cover",
                        "background-position": "center center"
                    });
                };

                reader.readAsDataURL(file);
            } else {
                // Si el archivo no es una imagen, mostrar la imagen de muestra
                setDefaultImage();
            }
        } else {
            setDefaultImage();
        }
    });
});

    </script>
@endpush
