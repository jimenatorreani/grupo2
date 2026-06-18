@php
    use Illuminate\Support\Facades\Auth;
@endphp
@extends('layouts.plantilla-base')

@section('titulo', 'Panel Administrador')

@section('content')

<div class="row mb-4">

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h6>Usuarios registrados</h6>
                <h2>{{ $totalUsuarios }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h6>Productos</h6>
                <h2>{{ $totalProductos }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h6>Pedidos</h6>
                <h2>{{ $totalPedidos }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h6>Ventas realizadas</h6>
                <h2>${{ number_format($totalVentas,0,',','.') }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="container py-5">

<div class="text-center mb-5">

    <h1 class="fw-bold">
        Panel Administrador
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
        Gestión integral del sistema
    </p>

</div>

<div class="card shadow border-0 mb-5">

    <div class="card-header text-center text-white"
         style="background-color:#1f252b;">

        <h3 class="mb-0">
            Bienvenida, {{ Auth::user()->name }}
        </h3>

    </div>

    <div class="card-body text-center p-4">

        <p class="text-muted mb-0 ">
            Desde aquí podrás administrar usuarios, roles,
            categorías, productos y supervisar el funcionamiento
            general de SportXpress.
        </p>

    </div>

</div>

</div>

<div class="row g-4">

    <div class="col-md-6">

        <div class="card shadow h-100">

            <div class="card-body text-center">

                <h3>👥</h3>

                <h5>Usuarios</h5>

                <p>
                    Gestionar usuarios registrados.
                </p>

                <a href="{{ route('usuarios.index') }}"
                   class="btn btn-sport">

                    Administrar

                </a>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow h-100">

            <div class="card-body text-center">

                <h3>🛡️</h3>

                <h5>Roles</h5>

                <p>
                    Gestionar roles del sistema.
                </p>

                <a href="{{ route('roles.index') }}"
                   class="btn btn-sport">

                    Administrar

                </a>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow h-100">

            <div class="card-body text-center">

                <h3>📂</h3>

                <h5>Categorías</h5>

                <p>
                    Gestionar categorías de productos.
                </p>

                <a href="{{ route('categorias.index') }}"
                   class="btn btn-sport">

                    Administrar

                </a>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow h-100">

            <div class="card-body text-center">

                <h3>👟</h3>

                <h5>Productos</h5>

                <p>
                    Gestionar productos del catálogo.
                </p>

                <a href="{{ route('productos.index') }}"
                   class="btn btn-sport">

                    Administrar

                </a>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow h-100">

            <div class="card-body text-center">

                <h3>🛒</h3>

                <h5>Ventas</h5>

                <p>
                    Visualizar ventas realizadas.
                </p>

                <a href="{{ route('admin.ventas.index') }}"
                   class="btn btn-sport">

                    Visualizar

                </a>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow h-100">

            <div class="card-body text-center">

                <h3>📨</h3>

                <h5>Consultas</h5>

                <p>
                    Consultas enviadas por clientes.
                </p>

                <a href="{{ route('admin.consultas.index') }}"
                    class="btn btn-sport">

                    Visualizar

                </a>

            </div>

        </div>

    </div>

</div>

<hr class="my-5">

<div class="text-center">

    <p class="text-muted">
        Administración y control del sistema SportXpress.
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
<br><br><br>
@endsection
