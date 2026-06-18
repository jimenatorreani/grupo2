@extends('layouts.plantilla-base')

@section('titulo', 'Mi Cuenta')

@section('content')

<div class="container py-5">

<div class="text-center mb-5">

    <h1 class="fw-bold">
        Mi Cuenta
    </h1>

    <h4>
        <span style="color:#1f252b;">
            Sport
        </span>

        <span style="color:#dc3545;">
            Xpress
        </span>
    </h4>

    <p class="text-muted">
        Bienvenido a tu espacio personal
    </p>

</div>

<div class="card shadow border-0 mb-5"
     style="
        background-color:#e9ecef;
        border-top:5px solid #dc3545 !important;
     ">

    <div class="card-body text-center p-4">

        <h3 class="fw-bold">
            Hola, {{ Auth::user()->name }}
        </h3>

        <p class="text-muted mb-0">
            Desde aquí podrás explorar productos,
            administrar tu perfil y consultar tus compras.
        </p>

    </div>

</div>

<div class="row g-4">

    <div class="col-md-6">

        <div class="card shadow h-100">

            <div class="card-body text-center">

                <h3>👟</h3>

                <h5>Catálogo</h5>

                <p>
                    Explorar productos disponibles.
                </p>

                <a href="{{ url('/hombres') }}"
                   class="btn btn-sport">

                    Ver Productos

                </a>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow h-100">

            <div class="card-body text-center">

                <h3>👤</h3>

                <h5>Mi Perfil</h5>

                <p>
                    Consultar información de tu cuenta.
                </p>

                <a href="{{ route('perfil.show') }}" class="btn btn-sport">

                Ver Perfil

                </a>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow h-100">

            <div class="card-body text-center">

                <h3>📦</h3>

                <h5>Mis Compras</h5>

                <p>
                    Ver historial de pedidos realizados.
                </p>

                <a href="{{ route('cliente.compras') }}"
                    class="btn btn-sport">

                     Ver Mis Compras

                </a>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow h-100">

            <div class="card-body text-center">

                <h3>🛒</h3>

                <h5>Mi Carrito</h5>

                <p>
                    Gestionar productos seleccionados.
                </p>

                <a href="{{ route('cliente.carrito') }}" class="btn btn-sport">
                    Ir al carrito
                </a>

            </div>

        </div>

    </div>

</div>

<hr class="my-5">

<div class="text-center">

    <p class="text-muted">
        Gracias por elegir SportXpress.
    </p>

    <form action="{{ route('logout') }}"
          method="POST">

        @csrf

        <button type="submit"
                class="btn btn-danger">

            Cerrar Sesión

        </button>

    </form>

</div>

</div>

@endsection
