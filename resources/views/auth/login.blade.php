@extends('layouts.plantilla-base')

@section('titulo', 'Iniciar Sesión')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6">

            <div class="card shadow border-0">

                <div class="card-header text-center text-white"
                     style="background-color:#1f252b;">

                    <div class="text-center">

                        <h2 class="mb-1 fw-bold">
                            Iniciar Sesión
                        </h2>

                        <h4 class="mb-0">
                            <span style="color:white;">
                                Sport
                            </span>
                            <span style="color:#dc3545;">
                                Xpress
                            </span>
                        </h4>

                    </div>

                </div>

                <div class="card-body p-4">

                    {{-- Mensaje de éxito después del registro --}}
                    @if(session('exito'))
                        <div class="alert alert-success">
                            {{ session('exito') }}
                        </div>
                    @endif

                    {{-- Errores de validación --}}
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('login') }}"
                          method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Correo Electrónico
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email') }}"
                                   required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Contraseña
                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="d-grid">

                            <button type="submit"
                                    class="btn btn-sport btn-lg">

                                Ingresar

                            </button>

                        </div>

                    </form>

                    <hr>

                    <div class="text-center">

                        ¿Todavía no tenés una cuenta?

                        <br>

                        <a href="{{ route('registro.form') }}"
                           class="btn btn-outline-dark mt-2">

                            Registrarme

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<br>

@endsection