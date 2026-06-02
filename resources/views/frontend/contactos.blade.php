@extends('layouts.plantilla-base')
@section('titulo', 'CONTACTO')
@section('content')
<br>
<h2>CONTACTO</h2>

<p>Información de Contacto:
Titulares de la Empresa: Torreani Jimena-Lencinas Mauricio    S.A
</p>
<p>Domicilio Legal: 9 de Julio 1449
</p>
<p>Teléfono: 3794-770467
</p>
<p>Email: indumentariasport@gmail.com
</p>

<h1>Consultas</h1>

<p>Completá el siguiente formulario y nos pondremos en contacto con vos.</p>

<form method="POST" action="/contacto">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Correo electrónico</label>
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
<br><br><br>
@endsection
