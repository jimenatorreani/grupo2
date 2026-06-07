@extends('layouts.plantilla-base')

@section('titulo', 'Ver Rol')

@section('content')

<h1>Detalle del Rol</h1>

<div class="card">

    <div class="card-body">

        <p>
            <strong>ID:</strong>
            {{ $rol->id }}
        </p>

        <p>
            <strong>Nombre:</strong>
            {{ $rol->nombre }}
        </p>

        <p>
            <strong>Descripción:</strong>
            {{ $rol->descripcion }}
        </p>

    </div>

</div>

<br>

<a href="{{ route('roles.index') }}"
   class="btn btn-secondary">
    Volver
</a>
<br><br>
@endsection