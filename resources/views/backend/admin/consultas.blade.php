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
            </tr>
        </thead>

        <tbody>
            @forelse($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->nombre }}</td>
                    <td>{{ $consulta->email }}</td>
                    <td>{{ $consulta->asunto }}</td>
                    <td>{{ $consulta->mensaje }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        No hay consultas registradas.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>

@endsection