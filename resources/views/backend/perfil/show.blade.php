@extends('layouts.plantilla-base')

@section('titulo', 'Mi Perfil')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">Mi Perfil</h2>

    <div class="card shadow">

        <div class="card-body">

            <p>
                <strong>Nombre:</strong>
                {{ Auth::user()->name }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ Auth::user()->email }}
            </p>

            <p>
                <strong>Rol:</strong>
                {{ Auth::user()->rol->nombre }}
            </p>

            <p>
                <strong>Miembro desde:</strong>
                {{ Auth::user()->created_at->format('d/m/Y') }}
            </p>

            <a href="{{ route('perfil.edit') }}"
               class="btn btn-warning">

                Editar Perfil

            </a>

        </div>

    </div>

</div>

@endsection