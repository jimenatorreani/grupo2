
@extends('layouts.plantilla-base')

@section('content')

<br><h2 class="catalogomujeres">MUJERES</h2><br>
<div class="mb-4 text-center">

    <a href="/mujeres" class="btn btn-outline-dark mi-boton-subcategoria">Todos</a>
    <a href="/mujeres/conjuntos" class="btn btn-outline-dark mi-boton-subcategoria">Conjuntos</a>
    <a href="/mujeres/remeras" class="btn btn-outline-dark mi-boton-subcategoria">Remeras</a>
    <a href="/mujeres/zapatillas" class="btn btn-outline-dark mi-boton-subcategoria">Zapatillas</a>

</div>

@if(!$categoria || $categoria == 'conjuntos')
<div class="row">
    @for ($i = 1; $i <= 16; $i++)
        @include('partials.card-producto', [
            'nombre' => 'Conjunto deportivo',
            'precio' => '$12.000',
            'imagen' => 'mujeres/conjuntos/conjunto'.$i.'.jpg'
        ])
    @endfor
</div>
@endif

@if(!$categoria || $categoria == 'remeras')
<div class="row">
    @for ($i = 1; $i <= 14; $i++)
        @include('partials.card-producto', [
            'nombre' => 'Remera deportiva',
            'precio' => '$12.000',
            'imagen' => 'mujeres/remeras/remera'.$i.'.jpg'
        ])
    @endfor
</div>
@endif

{{-- 
<h4>Calzas Largas</h4>
<div class="row">
    @for ($i = 1; $i <= 4; $i++)
        @include('partials.card-producto', [
            'nombre' => 'Calza larga deportiva',
            'precio' => '$12.000',
            'imagen' => 'mujeres/calzas-largas/calza-larga'.$i.'.jpg'
        ])
    @endfor
</div>

<h4 class="mt-4">Tops</h4>
<div class="row">
    @for ($i = 1; $i <= 4; $i++)
        @include('partials.card-producto', [
            'nombre' => 'Top deportivo',
            'precio' => '$9.000',
            'imagen' => 'mujeres/tops/top'.$i.'.jpg'
        ])
    @endfor
</div>
--}}

@endsection
