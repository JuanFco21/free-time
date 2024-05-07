@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Categorias') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Categorias') }}</h4>
                <div class="card-header-action">
                    @if (Auth::guard('admin')->check() &&
                            Auth::guard('admin')->user()->can('category.create'))
                        <a href="{{ route('category.create') }}" class="btn btn-primary">
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
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if ($category->status === App\Enums\Status::ACTIVE)
                                            <div class="badge badge-success">{{ $category->status }}</div>
                                        @elseif ($category->status === App\Enums\Status::INACTIVE)
                                            <div class="badge badge-danger">{{ $category->status }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::guard('admin')->check() &&
                                                Auth::guard('admin')->user()->can('category.edit'))
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                        @if (Auth::guard('admin')->check() &&
                                                Auth::guard('admin')->user()->can('category.destroy'))
                                            <div class="d-inline-block">
                                                <form method="POST"
                                                    action="{{ route('category.destroy', $category->id) }}">
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
