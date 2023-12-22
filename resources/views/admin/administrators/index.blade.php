@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Administradores') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Administradores') }}</h4>
                <div class="card-header-action">
                    @if (Auth::guard('admin')->check() &&
                            Auth::guard('admin')->user()->can('usuarios.create'))
                        <a href="{{ route('administrator.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> {{ __('Crear nuevo administrador') }}
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
                                <th>{{ __('Nombre Completo') }}</th>
                                <th>{{ __('Foto de perfil') }}</th>
                                <th>{{ __('Correo Electrónico') }}</th>
                                <th>{{ __('Rol') }}</th>
                                <th>{{ __('Género') }}</th>
                                <th>{{ __('Estatus') }}</th>
                                <th>{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($administrators as $administrator)
                                <tr>
                                    <td>{{ $administrator->id }}</td>
                                    <td>{{ $administrator->name . ' ' . $administrator->last_name }}</td>
                                    <td>
                                        <img class="rounded-circle" width="35" height="35" data-toggle="tooltip"
                                            title=""
                                            data-original-title="{{ $administrator->name . ' ' . $administrator->last_name }}"
                                            src="{{ !empty($administrator->image) ? asset('storage/users-img/' . $administrator->image) : asset('storage/users-img/avatar-5.png') }}"
                                            alt="Imagen de usuario">
                                    </td>
                                    <td>{{ $administrator->email }}</td>
                                    <td>{{ $administrator->getRoleNames()->first() }}</td>
                                    <td>
                                        @if ($administrator->gender === App\Enums\Gender::MALE)
                                            {{ $administrator->gender }}
                                        @elseif ($administrator->gender === App\Enums\Gender::FEMALE)
                                            {{ $administrator->gender }}
                                        @else
                                            <span>Sin género</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($administrator->status === App\Enums\Status::ACTIVE)
                                            <div class="badge badge-success">{{ $administrator->status }}</div>
                                        @elseif ($administrator->status === App\Enums\Status::INACTIVE)
                                            <div class="badge badge-success">{{ $administrator->status }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::guard('admin')->check() &&
                                                Auth::guard('admin')->user()->can('usuarios.edit'))
                                            <a href="{{ route('administrator.edit', $administrator->id) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                        @if (Auth::guard('admin')->check() &&
                                                Auth::guard('admin')->user()->can('usuarios.destroy'))
                                            <div class="d-inline-block">
                                                <form method="POST"
                                                    action="{{ route('administrator.destroy', $administrator->id) }}">
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
