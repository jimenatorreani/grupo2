@extends('layouts.plantilla-base')

@section('titulo', 'Editar Categoría')

@section('content')
<br>
<h1 class="mb-4">Editar Categoría</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categorias.update', $categoria->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label for="descripcion" class="form-label">
            Descripción
        </label>

        <input
            type="text"
            name="descripcion"
            id="descripcion"
            class="form-control"
            value="{{ old('descripcion', $categoria->descripcion) }}"
            required
        >

    </div>

    <button type="submit"
            class="btn btn-success">
        Actualizar
    </button>

    <a href="{{ route('categorias.index') }}"
       class="btn btn-secondary">
        Cancelar
    </a>

</form>
<br><br>
@endsection