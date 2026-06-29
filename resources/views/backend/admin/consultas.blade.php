@extends('layouts.plantilla-base')

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

    <div class="card shadow border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark text-white">
                        <tr>
                            <th>#ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Asunto</th>
                            <th>Mensaje</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($consultas as $consulta)
                            <tr>
                                <td><small class="text-muted">#{{ $consulta->id }}</small></td>
                                <td>
                                    <strong>{{ $consulta->nombre }}</strong>
                                </td>
                                <td>
                                    <small>{{ $consulta->email }}</small>
                                </td>
                                <td>
                                    <strong>{{ $consulta->asunto }}</strong>
                                </td>
                                <td>
                                    <small class="text-muted">{{ Str::limit($consulta->mensaje, 50) }}</small>
                                </td>
                                <td>
                                    <select name="estado" class="form-select form-select-sm consulta-estado w-auto" data-url="{{ route('admin.consultas.estado', $consulta) }}" data-id="{{ $consulta->id }}">
                                        <option value="pendiente" {{ $consulta->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="leido" {{ $consulta->estado == 'leido' ? 'selected' : '' }}>Leído</option>
                                        <option value="respondido" {{ $consulta->estado == 'respondido' ? 'selected' : '' }}>Respondido</option>
                                    </select>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $consulta->created_at ? $consulta->created_at->format('d/m/Y H:i') : '-' }}</small>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    No hay consultas registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
<form method="POST" action="/consultas/{{ $consulta->id }}/responder">
    @csrf

    <textarea name="respuesta" class="form-control" placeholder="Escribí la respuesta..."></textarea>

    <button type="submit" class="btn btn-success mt-2">
        Responder
    </button>
</form>
</div>

@endsection