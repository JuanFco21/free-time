@extends('admin.layouts.master')

@section('admin')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Sobre nosotros') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Sobre nosotros') }}</h4>
            </div>
            <div class="card-body">
                <div class="tab-content tab-bordered">
                    <div class="card-body">
                        <form action="{{ route('about.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            @if ($about->isEmpty())
                                <div class="form-group">
                                    <label for="">{{ __('Contenido') }}</label>
                                    <textarea name="content" class="summernote-simple"></textarea>
                                    @error('content')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="">{{ __('Contenido') }}</label>
                                    <textarea name="content" class="summernote-simple">{!! $about[0]['content'] !!}</textarea>
                                    @error('content')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
