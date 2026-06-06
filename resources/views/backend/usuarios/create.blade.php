@extends('layouts.plantilla-base')

@section('titulo', 'Nuevo Usuario')

@section('content')
<br>
<h1 class="mb-4">Nuevo Usuario</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('usuarios.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">
            Nombre
        </label>

        <input type="text"
               name="name"
               id="name"
               class="form-control"
               value="{{ old('name') }}"
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
               value="{{ old('email') }}"
               required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">
            Contraseña
        </label>

        <input
            type="password"
            name="password"
            id="password"
            class="form-control"
            required
    >
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">
            Confirmar Contraseña
        </label>

        <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            class="form-control"
            required
        >
    </div>

    <div class="mb-3">
        <label for="rol_id" class="form-label">
            Rol
        </label>

        <select name="rol_id"
                id="rol_id"
                class="form-select"
                required>

            <option value="">
                Seleccione un rol
            </option>

            @foreach($roles as $rol)

                <option value="{{ $rol->id }}">
                    {{ $rol->nombre }}
                </option>

            @endforeach

        </select>
    </div>

    <button type="submit"
            class="btn btn-success">
        Guardar
    </button>

    <a href="{{ route('usuarios.index') }}"
       class="btn btn-secondary">
        Cancelar
    </a>
<br><br><br>
</form>

@endsection