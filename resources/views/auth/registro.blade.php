@extends('layouts.plantilla-base')

@section('titulo', 'Registro')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6">

            <div class="card shadow border-0">

                <div class="card-header text-center text-white"
                     style="background-color:#1f252b;">

                    <div class="text-center">

                        <h2 class="mb-1 fw-bold">
                            Crear Cuenta
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

                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('registro') }}"
                          method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Nombre Completo
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name') }}"
                                   required>

                        </div>

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

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Contraseña
                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Confirmar Contraseña
                            </label>

                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="d-grid">

                            <button type="submit" class="btn btn-sport btn-lg">

                                Registrarme

                            </button>

                        </div>

                    </form>

                    <hr>

                    <div class="text-center">

                        ¿Ya tenés una cuenta?

                        <br>

                        <a href="{{ route('login.form') }}"
                           class="btn btn-outline-dark mt-2">

                            Iniciar Sesión

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<br>
@endsection