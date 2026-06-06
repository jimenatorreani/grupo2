@extends('layouts.plantilla-base')

@section('titulo', 'Editar Usuario')

@section('content')

<h1 class="mb-4">Editar Usuario</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('usuarios.update', $usuario->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">
            Nombre
        </label>

        <input type="text"
               name="name"
               id="name"
               class="form-control"
               value="{{ old('name', $usuario->name) }}"
               required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">
            Email
        </label>

        <input type="email"
               name="email"
               id="email"
               class="form-control"
               value="{{ old('email', $usuario->email) }}"
               required>
    </div>

    <div class="mb-3">
        <label for="rol_id" class="form-label">
            Rol
        </label>

        <select name="rol_id"
                id="rol_id"
                class="form-select"
                required>

            @foreach($roles as $rol)

                <option value="{{ $rol->id }}"
                    {{ $usuario->rol_id == $rol->id ? 'selected' : '' }}>
                    {{ $rol->nombre }}
                </option>

            @endforeach

        </select>
    </div>

    <button type="submit"
            class="btn btn-success">
        Actualizar
    </button>

    <a href="{{ route('usuarios.index') }}"
       class="btn btn-secondary">
        Cancelar
    </a>
<br><br>
</form>

@endsection