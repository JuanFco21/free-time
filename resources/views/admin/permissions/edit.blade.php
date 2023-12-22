@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Permisos') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Editar Permiso') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('permission.update', $permission->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('Nombre del Permiso') }}</label>
                        <input type="text" class="form-control" name="name" value="{{ $permission->name }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="group_name">{{ __('Grupo de Permisos') }}</label>
                        <select name="group_name" id="" class="select2 form-control">
                            <option value="" disabled>{{ __('---Selecciona un grupo---') }}</option>
                            <option value="Usuarios" {{ $permission->group_name == 'Usuarios' ? 'selected' : '' }}>Usuarios</option>
                            <option value="Roles" {{ $permission->group_name == 'Roles' ? 'selected' : '' }}>Roles</option>
                            <option value="Permisos" {{ $permission->group_name == 'Permisos' ? 'selected' : '' }}>Permisos</option>
                            <option value="Biblioteca Digital" {{ $permission->group_name == 'Biblioteca Digital' ? 'selected' : '' }}>Biblioteca Digital</option>
                        </select>
                        @error('group_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <a href="{{ route('permission.index')}}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
