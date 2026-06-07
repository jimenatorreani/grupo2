@extends('layouts.plantilla-base')

@section('titulo', 'Crear Rol')

@section('content')

<h1>Crear Rol</h1>

@if ($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<form action="{{ route('roles.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">

        <label class="form-label">
            Nombre
        </label>

        <input type="text"
               name="nombre"
               class="form-control"
               value="{{ old('nombre') }}"
               required>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Descripción
        </label>

        <textarea name="descripcion"
                  class="form-control"
                  rows="3">{{ old('descripcion') }}</textarea>

    </div>

    <button type="submit"
            class="btn btn-success">
        Guardar
    </button>

    <a href="{{ route('roles.index') }}"
       class="btn btn-secondary">
        Volver
    </a>

</form>
<br><br>
@endsection