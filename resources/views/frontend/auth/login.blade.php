@extends('frontend.layouts.master')

@section('home')
    <!-- Login -->
    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mx-auto" style="max-width: 380px;">
                        <div class="card-body">
                            <h3 class="card-title text-center mt-4 mb-4">Iniciar Sesión</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email">Correo Electrónico</label>
                                    <input type="text" name="email" class="form-control" placeholder="Escribre tu correo electrónico">
                                        @error('email')
                                            <code>{{ $message }}</code>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input  type="password" name="password" class="form-control" placeholder="Escribre tu contraseña">
                                        @error('password')
                                        <code>{{ $message }}</code>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <div class="form-group">
                                        <a href="#" class="">¿Olvidaste tu contraseña?</a>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox"> <input type="checkbox"
                                                class="custom-control-input" name="remember">
                                            <span class="custom-control-label"> Recuérdame </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Iniciar Sesión
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end login -->
@endsection
