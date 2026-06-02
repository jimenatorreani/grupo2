@extends('layouts.plantilla-base')

@section('content')

<h1>Consultas</h1>

<p>Complet├í el siguiente formulario y nos pondremos en contacto con vos.</p>

<form method="POST" action="/contacto">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Correo electr├│nico</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Asunto</label>
        <input type="text" name="asunto" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Mensaje</label>
        <textarea name="mensaje" class="form-control" rows="4" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection
