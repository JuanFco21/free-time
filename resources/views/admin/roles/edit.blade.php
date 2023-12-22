@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Roles') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Editar Rol') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('role.update', $role->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('Nombre del Rol') }}</label>
                        <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <hr>
                    @foreach ($permissions as $group_name => $permission)
                    <div class="form-group">
                        <h6 class="text-primary">{{ $group_name }}</h6>
                        <div class="row">
                            @foreach ($permission as $item)
                            <div class="col-md-2">
                                <label class="custom-switch mt-2">
                                    <input
                                    {{ in_array($item->name, $roles_with_permissions) ? 'checked' : '' }}
                                    value="{{ $item->name }}" type="checkbox" name="permissions[]" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description text-primary">{{ $item->name }}</span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <a href="{{ route('role.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
