@extends('layouts.plantilla-base')

@section('titulo', 'Nueva Categoría')

@section('content')
<br><br>
<h1 class="mb-4">Nueva Categoría</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categorias.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="descripcion" class="form-label">
            Descripción
        </label>

        <input
            type="text"
            name="descripcion"
            id="descripcion"
            class="form-control"
            value="{{ old('descripcion') }}"
            required
        >
    </div>

    <button type="submit" class="btn btn-success">
        Guardar
    </button>

    <a href="{{ route('categorias.index') }}"
       class="btn btn-secondary">
        Cancelar
    </a>

</form>
<br><br><br>
@endsection