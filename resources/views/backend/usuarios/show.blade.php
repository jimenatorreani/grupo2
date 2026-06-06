@extends('layouts.plantilla-base')

@section('titulo', 'Ver Usuario')

@section('content')
<br>
<h1 class="mb-4">Detalle del Usuario</h1>

<div class="card">

    <div class="card-header">
        Usuario #{{ $usuario->id }}
    </div>

    <div class="card-body">

        <p>
            <strong>Nombre:</strong>
            {{ $usuario->name }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ $usuario->email }}
        </p>

        <p>
            <strong>Rol:</strong>
            {{ $usuario->rol->nombre }}
        </p>

        <p>
            <strong>Creado:</strong>
            {{ $usuario->created_at }}
        </p>

        <p>
            <strong>Actualizado:</strong>
            {{ $usuario->updated_at }}
        </p>

    </div>

</div>

<div class="mt-3">

    <a href="{{ route('usuarios.edit', $usuario->id) }}"
       class="btn btn-warning">
        Editar
    </a>

    <a href="{{ route('usuarios.index') }}"
       class="btn btn-secondary">
        Volver
    </a>

</div>
<br><br>
@endsection