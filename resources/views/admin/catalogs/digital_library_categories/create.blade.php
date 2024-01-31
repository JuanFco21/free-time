@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Biblioteca Digital (Categorias)') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Crear Categoria') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('digital_library_category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12">
                            <label for="">{{ __('Nombre') }}</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 col-md-12">
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
                    <a href="{{ route('digital_library_category.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
