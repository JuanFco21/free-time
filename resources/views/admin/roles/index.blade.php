@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Roles') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Roles') }}</h4>
                <div class="card-header-action">
                    @if (Auth::guard('admin')->check() &&
                            Auth::guard('admin')->user()->can('roles.create'))
                        <a href="{{ route('role.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> {{ __('Crear nuevo rol') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    {{ __('ID') }}
                                </th>
                                <th>{{ __('Nombre del Rol') }}</th>
                                <th>{{ __('Permisos Asignados') }}</th>
                                <th>{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="p-1">
                                        @foreach ($role->permissions as $permission)
                                            <span class="badge bg-primary text-light mt-2 mb-2">
                                                {{ $permission->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if (Auth::guard('admin')->check() &&
                                                Auth::guard('admin')->user()->can('roles.edit'))
                                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                        @if (Auth::guard('admin')->check() &&
                                                Auth::guard('admin')->user()->can('roles.destroy'))
                                            <div class="d-inline-block">
                                                <form method="POST" action="{{ route('role.destroy', $role->id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="btn btn-danger delete-item"><i
                                                            class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $("#table").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
    </script>
@endpush
