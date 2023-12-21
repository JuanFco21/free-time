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
                            <form action="#">
                                <div class="form-group mb-3">
                                    <label for="email">Correo Electrónico</label>
                                    <input id="email" class="form-control" placeholder="Escribre tu correo electrónico"
                                        type="text">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input id="password" class="form-control" placeholder="Escribre tu contraseña"
                                        type="password">
                                </div>
                                <div class="text-center">
                                    <div class="form-group">
                                        <a href="#" class="">¿Olvidaste tu contraseña?</a>

                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox"> <input type="checkbox"
                                                class="custom-control-input" checked="">
                                            <span class="custom-control-label"> Recuérdame </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a type="button" href="sesion.html" class="btn btn-primary btn-block"> Iniciar Sesión
                                    </a>
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
