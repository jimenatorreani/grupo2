@extends('layouts.plantilla-base')

@section('titulo', 'Crear Producto')

@section('content')
<br>
<h1>Crear Producto</h1>

<form action="{{ route('productos.store') }}"
      method="POST"
      enctype="multipart/form-data">
      {{-- los  formularios html normalmente sólo envían texto.
           Cuando queremos enviar archivos de tipo imagenes, pdf, archivo word, etc.. 
           necesitamos agregar: enctype="multipart/form-data", 
           si no se agrega eso, laravel nunca recibirá la imágen --}}

    @csrf

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text"
               name="nombre"
               class="form-control"
               value="{{ old('nombre') }}">
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion"
                  class="form-control">{{ old('descripcion') }}</textarea>
    </div>

    <div class="mb-3">
        <label>Precio</label>
        <input type="number"
               step="0.01"
               name="precio"
               class="form-control"
               value="{{ old('precio') }}">
    </div>

    <div class="mb-3">
        <label>Stock</label>
        <input type="number"
               name="stock"
               class="form-control"
               value="{{ old('stock') }}">
    </div>

    <div class="mb-3">
        <label>Imagen del producto</label>
        <input type="file" 
           name="url_imagen"
           class="form-control"
           accept="image/*">
           {{-- accept="image/*" le dice al navegador "sólo permitir imagenes"
                por ejemplo: jpg, jpeg, png, webp. Pero NO: pdf, zip, exe 
            --}}
    </div>

    <div class="mb-3">
        <label>Género</label>

        <select name="genero" class="form-select">

            <option value="masculino">Masculino</option>

            <option value="femenino">Femenino</option>

            <option value="unisex">Unisex</option>

        </select>

    </div>

    <div class="mb-3">

        <label>Categoría</label>

        <select name="categoria_id" class="form-select">

            @foreach($categorias as $categoria)

                <option value="{{ $categoria->id }}">
                    {{ $categoria->descripcion }}
                </option>

            @endforeach

        </select>

    </div>
{{-- 
    <div class="mb-3">

        <label>Estado</label>

        <select name="activo" class="form-select">

            <option value="1">
                Activo
            </option>

            <option value="0">
                Inactivo
            </option>

        </select>

    </div>
--}}
    <button type="submit"
            class="btn btn-success">
        Guardar
    </button>

</form>
<br><br><br>
@endsection