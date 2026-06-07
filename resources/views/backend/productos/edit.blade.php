@extends('layouts.plantilla-base')

@section('titulo', 'Editar Producto')

@section('content')
<br>
<h1>Editar Producto</h1>

<form action="{{ route('productos.update', $producto->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    {{-- nombre --}}
    <input type="text"
           name="nombre"
           class="form-control mb-3"
           value="{{ $producto->nombre }}">

    {{-- descripción --}}
    <textarea name="descripcion"
              class="form-control mb-3">{{ $producto->descripcion }}</textarea>

    {{-- precio --}}
    <input type="number"
           step="0.01"
           name="precio"
           class="form-control mb-3"
           value="{{ $producto->precio }}">

    {{-- stock --}}
    <input type="number"
           name="stock"
           class="form-control mb-3"
           value="{{ $producto->stock }}">

    {{-- url --}}
    <input type="text"
           name="url_imagen"
           class="form-control mb-3"
           value="{{ $producto->url_imagen }}">

    {{-- genero --}}
    <select name="genero"
            class="form-select mb-3">

        <option value="masculino"
            {{ $producto->genero == 'masculino' ? 'selected' : '' }}>
            Masculino
        </option>

        <option value="femenino"
            {{ $producto->genero == 'femenino' ? 'selected' : '' }}>
            Femenino
        </option>

        <option value="unisex"
            {{ $producto->genero == 'unisex' ? 'selected' : '' }}>
            Unisex
        </option>

    </select>

    {{-- categoria --}}
    <select name="categoria_id"
            class="form-select mb-3">

        @foreach($categorias as $categoria)

            <option value="{{ $categoria->id }}"
                {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->descripcion }}
            </option>

        @endforeach

    </select>

    {{-- activo --}}
    <select name="activo"
            class="form-select mb-3">

        <option value="1"
            {{ $producto->activo ? 'selected' : '' }}>
            Activo
        </option>

        <option value="0"
            {{ !$producto->activo ? 'selected' : '' }}>
            Inactivo
        </option>

    </select>

    <button type="submit"
            class="btn btn-success">
        Actualizar
    </button>

</form>
<br><br><br>
@endsection