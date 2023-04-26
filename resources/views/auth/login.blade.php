@extends('layouts.app')

@section('content')
    <div id="login" class="container-fluid mt-0">
        <div id="page-content" class="row">
            <div id="region-main-box" class="col-12">
                <section id="region-main" class="col-12">
                    <div role="main">
                        <div class="my-1 my-sm-5"></div>

                        <div class="row justify-content-center logo">
                            <img src="{{ asset('images/logo.png') }}"
                                title="Landes" alt="Landes" id="logo">
                        </div>
                        <div class="row justify-content-center my-4">
                            <div class="col-12 col-md-12 col-lg-8">
                                <div class="card">


                                    <div class="card-header">
                                        <h3>Inicio Sesión</h3>
                                    </div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="row mb-3">
                                                <div class="input-group form-group col-md-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"
                                                                style="color: #ffffff;"></i></span>
                                                    </div>
                                                    <input id="email" type="email" placeholder="Correo Electrónico"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="input-group form-group col-md-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-key "
                                                                style="color: #ffffff;"></i></span>
                                                    </div>
                                                    <input id="password" type="password" placeholder="Contraseña"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password">

                                                </div>
                                                <div class="row align-items-center remember col-md-6">
                                                    <input type="checkbox">Recordarme
                                                </div>

                                            </div>



                                            <div class="form-group">
                                                <div class="col d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Ingreso') }}
                                                    </button>


                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <div class="d-flex justify-content-center">
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('¿Olvidaste tu contraseña?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
