@extends('layouts.plantilla-base')

@section('titulo', 'Ver Categoría')

@section('content')
<br>
<h1 class="mb-4">Detalle de Categoría</h1>

<div class="card">

    <div class="card-header">
        Categoría #{{ $categoria->id }}
    </div>

    <div class="card-body">

        <p>
            <strong>ID:</strong>
            {{ $categoria->id }}
        </p>

        <p>
            <strong>Descripción:</strong>
            {{ $categoria->descripcion }}
        </p>

        <p>
            <strong>Creada:</strong>
            {{ $categoria->created_at }}
        </p>

        <p>
            <strong>Actualizada:</strong>
            {{ $categoria->updated_at }}
        </p>

    </div>

</div>

<div class="mt-3">

    <a href="{{ route('categorias.edit', $categoria->id) }}"
       class="btn btn-warning">
        Editar
    </a>

    <a href="{{ route('categorias.index') }}"
       class="btn btn-secondary">
        Volver
    </a>

</div>
<br><br>
@endsection