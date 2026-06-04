
@extends('layouts.plantilla-base')

@section('content')

<br><h2 class="catalogomujeres">HOMBRES</h2><br>
<div class="mb-4 text-center">

    <a href="/hombres" class="btn btn-outline-dark mi-boton-subcategoria">Todos</a>
    <a href="/hombres/remeras" class="btn btn-outline-dark mi-boton-subcategoria">Remeras</a>
    <a href="/hombres/joggings" class="btn btn-outline-dark mi-boton-subcategoria">Joggings</a>
    <a href="/hombres/zapatillas" class="btn btn-outline-dark mi-boton-subcategoria">Zapatillas</a>

</div>

@if(!$categoria || $categoria == 'remeras')
<div class="row">
    @for ($i = 1; $i <= 16; $i++)
        @include('partials.card-producto', [
            'nombre' => 'Remera deportiva',
            'precio' => '$10.000',
            'imagen' => 'hombres/remeras/remera'.$i.'.jpg'
        ])
    @endfor
</div>
@endif

@if(!$categoria || $categoria == 'joggings')
<div class="row">
    @for ($i = 1; $i <= 16
    ; $i++)
        @include('partials.card-producto', [
            'nombre' => 'Jogging',
            'precio' => '$15.000',
            'imagen' => 'hombres/joggings/jogging'.$i.'.jpg'
        ])
    @endfor
</div>
@endif

@endsection
