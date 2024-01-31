@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Biblioteca Digital (Categorias)') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Biblioteca Digital (Categorias)') }}</h4>
                <div class="card-header-action">
                    @if (Auth::guard('admin')->check() &&
                            Auth::guard('admin')->user()->can('digital_library_category.create'))
                        <a href="{{ route('digital_library_category.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> {{ __('Crear nueva categoria') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('ID') }}</th>
                                <th>{{ __('Nombre de la categoria') }}</th>
                                <th>{{ __('Estatus') }}</th>
                                <th>{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($digital_library_categories as $digital_library_category)
                                <tr>
                                    <td>{{ $digital_library_category->id }}</td>
                                    <td>{{ $digital_library_category->name }}</td>
                                    <td>
                                        @if ($digital_library_category->status === App\Enums\Status::ACTIVE)
                                            <div class="badge badge-success">{{ $digital_library_category->status }}</div>
                                        @elseif ($digital_library_category->status === App\Enums\Status::INACTIVE)
                                            <div class="badge badge-danger">{{ $digital_library_category->status }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::guard('admin')->check() &&
                                                Auth::guard('admin')->user()->can('digital_library_category.edit'))
                                            <a href="{{ route('digital_library_category.edit', $digital_library_category->id) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                        @if (Auth::guard('admin')->check() &&
                                                Auth::guard('admin')->user()->can('digital_library_category.destroy'))
                                            <div class="d-inline-block">
                                                <form method="POST"
                                                    action="{{ route('digital_library_category.destroy', $digital_library_category->id) }}">
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
