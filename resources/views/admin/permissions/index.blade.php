@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Permisos') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Permisos') }}</h4>
                <div class="card-header-action">
                    @if (Auth::guard('admin')->check() &&
                            Auth::guard('admin')->user()->can('permisos.create'))
                        <a href="{{ route('permission.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> {{ __('Crear nuevo permiso') }}
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
                                <th>{{ __('Nombre del Permisos') }}</th>
                                <th>{{ __('Grupo del Permiso') }}</th>
                                <th>{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->group_name }}</td>
                                    <td>
                                        @if (Auth::guard('admin')->check() &&
                                                Auth::guard('admin')->user()->can('permisos.edit'))
                                            <a href="{{ route('permission.edit', $permission->id) }}"
                                                class="btn btn-warning"><i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                        @if (Auth::guard('admin')->check() &&
                                                Auth::guard('admin')->user()->can('permisos.destroy'))
                                            <div class="d-inline-block">
                                                <form method="POST"
                                                    action="{{ route('permission.destroy', $permission->id) }}">
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
