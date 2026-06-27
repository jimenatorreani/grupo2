@extends('layouts.plantilla-base')

@section('content')

<div class="container mt-4">

    <h2>Consultas recibidas</h2>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Estado</th>
            </tr>
        </thead>

        <tbody>
            @forelse($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->nombre }}</td>
                    <td>{{ $consulta->email }}</td>
                    <td>{{ $consulta->asunto }}</td>
                    <td>{{ $consulta->mensaje }}</td>
                    <td>
                        <select name="estado" class="form-select form-select-sm consulta-estado" data-url="{{ route('admin.consultas.estado', $consulta) }}">
                            <option value="pendiente" {{ $consulta->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="leido" {{ $consulta->estado == 'leido' ? 'selected' : '' }}>Leído</option>
                            <option value="respondido" {{ $consulta->estado == 'respondido' ? 'selected' : '' }}>Respondido</option>
                        </select>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        No hay consultas registradas.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.consulta-estado').forEach(function(select) {
                select.addEventListener('change', function () {
                    const url = this.dataset.url;
                    const data = new FormData();
                    data.append('estado', this.value);

                    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
                    const token = csrfMeta ? csrfMeta.getAttribute('content') : null;

                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        },
                        body: data
                    })
                    .then(response => response.json())
                    .then(json => {
                        if (!json.status || json.status !== 'ok') {
                            alert('No se pudo actualizar el estado.');
                        }
                    })
                    .catch(() => {
                        alert('No se pudo actualizar el estado.');
                    });
                });
            });
        });
    </script>

</div>

@endsection