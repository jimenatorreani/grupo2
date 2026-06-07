@extends('layouts.plantilla-base')

@section('titulo', 'Detalle Producto')

@section('content')
<br>
<h1>Detalle del Producto</h1>

<ul class="list-group">

    <li class="list-group-item">
        <strong>ID:</strong>
        {{ $producto->id }}
    </li>

    <li class="list-group-item">
        <strong>Nombre:</strong>
        {{ $producto->nombre }}
    </li>

    <li class="list-group-item">
        <strong>Descripción:</strong>
        {{ $producto->descripcion }}
    </li>

    <li class="list-group-item">
        <strong>Precio:</strong>
        ${{ $producto->precio }}
    </li>

    <li class="list-group-item">
        <strong>Stock:</strong>
        {{ $producto->stock }}
    </li>

    <li class="list-group-item">
        <strong>Género:</strong>
        {{ $producto->genero }}
    </li>

    <li class="list-group-item">
        <strong>Categoría:</strong>
        {{ $producto->categoria->descripcion }}
    </li>

    <li class="list-group-item">
        <strong>Estado:</strong>
        {{ $producto->activo ? 'Activo' : 'Inactivo' }}
    </li>

</ul>

<br>

<a href="{{ route('productos.index') }}"
   class="btn btn-secondary">
    Volver
</a>
<br><br><br>
@endsection