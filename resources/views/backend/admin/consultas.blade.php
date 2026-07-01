@extends('layouts.plantilla-base')
@section('titulo', 'BANDEJA DE MENSAJES')
@section('content')

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Consultas recibidas</h2>
            <p class="text-muted mb-0">Gestión de consultas y mensajes de clientes.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Volver al panel</a>
    </div>

    {{-- Estadísticas de consultas --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card bg-warning text-dark border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-uppercase small mb-2">Pendientes</h6>
                    <h3 class="mb-0">{{ $consultas->where('estado', 'pendiente')->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-uppercase small mb-2">Leídas</h6>
                    <h3 class="mb-0">{{ $consultas->where('estado', 'leido')->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-uppercase small mb-2">Respondidas</h6>
                    <h3 class="mb-0">{{ $consultas->where('estado', 'respondido')->count() }}</h3>
                </div>
            </div>
        </div>
    </div>

    @forelse($consultas as $consulta)

    <div class="card shadow-sm mb-4">

        <div class="card-header d-flex justify-content-between align-items-center">

            <div>
                <h5 class="mb-0">{{ $consulta->nombre }}</h5>
                <small class="text-muted">{{ $consulta->email }}</small>
            </div>

            <div style="width:180px">

                <select
                    name="estado"
                    class="form-select consulta-estado"
                    data-url="{{ route('admin.consultas.estado', $consulta) }}">

                    <option value="pendiente"
                        {{ $consulta->estado=='pendiente' ? 'selected' : '' }}>
                        Pendiente
                    </option>

                    <option value="leido"
                        {{ $consulta->estado=='leido' ? 'selected' : '' }}>
                        Leído
                    </option>

                    <option value="respondido"
                        {{ $consulta->estado=='respondido' ? 'selected' : '' }}>
                        Respondido
                    </option>

                </select>

            </div>

    </div>

    <div class="card-body">

        <p>

            <strong>Asunto:</strong>

            {{ $consulta->asunto }}

        </p>

        <p>

            <strong>Consulta:</strong>

            <br>

            {{ $consulta->mensaje }}

        </p>

        {{-- Respuesta --}}
        <hr>

        <h6 class="text-success">
            Respuesta del administrador
        </h6>
        @if($consulta->respuesta)

            <div class="alert alert-success">

                <strong>Respuesta enviada</strong>

                <hr>

                {{ $consulta->respuesta }}

            </div>

        @else

            <div class="alert alert-warning">

                Aún no se respondió esta consulta.

            </div>

        @endif
    

        <form method="POST"
            action="{{ url('/consultas/'.$consulta->id.'/responder') }}">

            @csrf

            <textarea
                name="respuesta"
                class="form-control"
                rows="4"
                placeholder="Escriba la respuesta...">{{ old('respuesta', $consulta->respuesta) }}></textarea>

            <button
                class="btn btn-success mt-3">

                Responder

            </button>

        </form>

        <div class="text-end mt-3">

            <small class="text-muted">

            Recibida:

            {{ $consulta->created_at->format('d/m/Y H:i') }}

            </small>

        </div>
    </div>
</div>

    @empty

    <div class="alert alert-info">
        No hay consultas registradas.
    </div>

    @endforelse

    <script>
                document.addEventListener('DOMContentLoaded', function () {
                    document.querySelectorAll('.consulta-estado').forEach(function(select) {
                        select.addEventListener('change', function () {
                            const url = this.dataset.url;
                            const nuevoEstado = this.value;
                            const csrfMeta = document.querySelector('meta[name="csrf-token"]');
                            const token = csrfMeta ? csrfMeta.getAttribute('content') : null;

                            const formData = new FormData();
                            formData.append('estado', nuevoEstado);

                            fetch(url, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': token,
                                    'Accept': 'application/json'
                                },
                                body: formData
                            })
                            .then(response => response.json())
                            .then(json => {
                                if (json.status === 'ok') {
                                    // Mostrar badge del nuevo estado
                                    this.style.borderColor = this.value === 'pendiente' ? '#ffc107' : 
                                                            this.value === 'leido' ? '#0dcaf0' : '#198754';
                                } else {
                                    alert('No se pudo actualizar el estado.');
                                    location.reload();
                                }
                            })
                            .catch(() => {
                                alert('No se pudo actualizar el estado.');
                                location.reload();
                            });
                        });
                    });
                });
            </script>
@endsection