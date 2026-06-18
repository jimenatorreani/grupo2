@extends('layouts.plantilla-base')

@section('titulo', 'Editar Perfil')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">Editar Perfil</h2>

    <div class="card shadow">

        <div class="card-body">

            <form action="{{ route('perfil.update') }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name', Auth::user()->name) }}"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email', Auth::user()->email) }}"
                           class="form-control">

                </div>

                <button type="submit"
                        class="btn btn-success">

                    Guardar Cambios

                </button>

            </form>

        </div>

    </div>

</div>

@endsection