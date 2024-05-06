@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Biblioteca Digital') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Biblioteca Digital') }}</h4>
                <div class="card-header-action">
                    @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->can('digital_library.create'))
                        <a href="{{ route('digital_library.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> {{ __('Crear nuevo artículo') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>{{ __('No.') }}</th>
                                <th>{{ __('Titulo del articulo') }}</th>
                                <th>{{ __('Autores') }}</th>
                                <th>{{ __('Fecha de publicación') }}</th>
                                <th>{{ __('Etiquetas') }}</th>
                                <th>{{ __('Imagen') }}</th>
                                <th>{{ __('Año') }}</th>
                                <th>{{ __('Volumen') }}</th>
                                <th>{{ __('Número de páginas') }}</th>
                                <th>{{ __('Número') }}</th>
                                <th>{{ __('ISNN') }}</th>
                                <th>{{ __('Estatus') }}</th>
                                <th>{{ __('Responsable de publicación') }}</th>
                                <th>{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($digital_libraries as $digital_library)
                                <tr>
                                    <td>{{ $digital_library->id }}</td>
                                    <td>{{ $digital_library->title }}</td>
                                    <td class="p-1">
                                        @foreach (json_decode($digital_library->authors) as $authors)
                                            <span class="badge bg-primary text-light mt-2 mb-2">
                                                {{ $authors }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($digital_library->publication_date)->format('d/m/Y') }}
                                    </td>
                                    <td class="p-1">
                                        @foreach ($digital_library->tags as $tag)
                                            <span class="badge bg-primary text-light mt-2 mb-2">
                                                {{ $tag->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <img src="{{ asset($digital_library->article_image) }}" width="100" alt="">
                                    </td>
                                    <td>{{ $digital_library->article_year }}</td>
                                    <td>{{ $digital_library->article_volume }}</td>
                                    <td>{{ $digital_library->article_number_pages }}</td>
                                    <td>{{ $digital_library->article_number }}</td>
                                    <td>{{ $digital_library->isnn }}</td>
                                    <td>
                                        @if ($digital_library->status === App\Enums\PublicationStatus::PUBLISHED)
                                            <div class="badge badge-success">{{ $digital_library->status }}</div>
                                        @elseif ($digital_library->status === App\Enums\PublicationStatus::NOPUBLISHED)
                                            <div class="badge badge-danger">{{ $digital_library->status }}</div>
                                        @else
                                            <span class="badge text-bg-warning">Sin Asignar</span>
                                        @endif
                                    </td>
                                    <td>{{ $digital_library->administrator->name }}</td>
                                    <td>
                                        @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->can('digital_library.edit'))
                                            <a href="{{ route('digital_library.edit', $digital_library->id) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                        @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->can('digital_library.destroy'))
                                            <div class="d-inline-block mt-2">
                                                <form method="POST"
                                                    action="{{ route('digital_library.destroy', $digital_library->id) }}">
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
