@extends('layouts.plantilla-base')
@section('titulo', 'PRINCIPAL')
@section('content')

 {{--agrego un carrousel con imágenes de ropa deportiva para hombres y mujeres, utilizando el componente Carousel de Bootstrap.
     Cada imagen tiene una descripción alternativa para mejorar la accesibilidad. El carrousel incluye controles para navegar 
      entre las imágenes.--}}

    <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('img/ropaHombre1.jpg')}}" class="d-block w-100" alt="Ropa de hombre">
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/ropaHombre2.jpg')}}" class="d-block w-100" alt="Ropa de hombre">
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/ropaHombre3.jpg')}}" class="d-block w-100" alt="Ropa de hombre">
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/ropaMujer1.jpg')}}" class="d-block w-100" alt="Ropa de mujer">
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/ropaMujer2.jpg')}}" class="d-block w-100" alt="Ropa de mujer">
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/ropaMujer3.jpg')}}" class="d-block w-100" alt="Ropa de mujer">
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/ropaHyM.jpg')}}" class="d-block w-100" alt="Ropa de hombre y mujer">
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/ropaHyM2.jpg')}}" class="d-block w-100" alt="Ropa de hombre y mujer">
    </div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

  {{--Mediante css en el archivo public/css/estilos.css, agrego estilos personalizados para el carrousel, como ajustar la altura de las imágenes, 
   agregar un fondo oscuro con opacidad para mejorar la legibilidad de los controles y las descripciones
   y centrar el texto de las descripciones.--}}
<br>

<div class="banners">
    <img src="{{ asset('img/banners/banner7.jpg') }}" alt="pagos">
    <img src="{{ asset('img/banners/banner8.jpg') }}" alt="pagos">
    <img src="{{ asset('img/banners/banner9.jpg') }}" alt="pagos">
</div>
<br><br>
<h4 class="mb-5 titulosmigaleria">Entrená con estilo</h4>
<div class="gallery mi-galeria-conCSS">

<div class="gallery-item">
  <a target="_blank" href="img_5terre.jpg">
    <img src="{{ asset('img/banners/entrena-con-estilo/entrenar1.jpg') }}" alt="entrenar1" width="600" height="400">
  </a>
</div>

<div class="gallery-item">
  <a href="{{ asset('img/banners/entrena-con-estilo/entrenar2.jpg') }}">
    <img src="{{ asset('img/banners/entrena-con-estilo/entrenar2.jpg') }}" alt="entrenar2" width="600" height="400">
  </a>
</div>

<div class="gallery-item">
  <a  href="{{ asset('img/banners/entrena-con-estilo/entrenar9.jpg') }}">
    <img src="{{ asset('img/banners/entrena-con-estilo/entrenar9.jpg') }}" alt="entrenar9" width="600" height="400">
  </a>
</div>

<div class="gallery-item">
  <a href="{{ asset('img/banners/entrena-con-estilo/entrenar4.jpg') }}">
    <img src="{{ asset('img/banners/entrena-con-estilo/entrenar4.jpg') }}" alt="entrenar4" width="600" height="400">
  </a>
</div>

</div>

{{-- mi-galeria1 
<div class="container-fluid">
    <h4 class="mb-5 titulosmigaleria">Entrená con estilo</h4>

    <div class="row mi-galeria1 g-4">

        <div class="col-md-3">
            <div class="img-container">
            <img src="{{ asset('img/banners/entrena-con-estilo/entrenar1.jpg') }}" >
            </div>
        </div>

        <div class="col-md-3">
            <div class="img-container">
            <img src="{{ asset('img/banners/entrena-con-estilo/entrenar2.jpg') }}" >
            </div>
        </div>

        <div class="col-md-3">
            <div class="img-container">
            <img src="{{ asset('img/banners/entrena-con-estilo/entrenar9.jpg') }}" >
            </div>
        </div>

        <div class="col-md-3">
            <div class="img-container">
            <img src="{{ asset('img/banners/entrena-con-estilo/entrenar4.jpg') }}" >
            </div>
        </div>

    </div>
</div>
--}}
<br><br>

{{-- mi-galeria2--}}
<h4 class="mb-5 titulosmigaleria">Colecciones Destacadas</h4>
<div class="row mi-galeria2">

    <div class="col-md-2 mb-4">
        <div class="card h-100">
            <img src="{{ asset('img/banners/colecciones-destacadas/coleccion6.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Producto 1</h5>
                <p class="card-text">$10.000</p>
            </div>
        </div>
    </div>
    <div class="col-md-2 mb-4">
        <div class="card h-100">
            <img src="{{ asset('img/banners/colecciones-destacadas/coleccion1.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Producto 1</h5>
                <p class="card-text">$10.000</p>
            </div>
        </div>
    </div>
    <div class="col-md-2 mb-4">
        <div class="card h-100">
            <img src="{{ asset('img/banners/colecciones-destacadas/coleccion4.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Producto 1</h5>
                <p class="card-text">$10.000</p>
            </div>
        </div>
    </div>
    <div class="col-md-2 mb-4">
        <div class="card h-100">
            <img src="{{ asset('img/banners/colecciones-destacadas/coleccion2.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Producto 1</h5>
                <p class="card-text">$10.000</p>
            </div>
        </div>
    </div>
    <div class="col-md-2 mb-4">
        <div class="card h-100">
            <img src="{{ asset('img/banners/colecciones-destacadas/coleccion7.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Producto 1</h5>
                <p class="card-text">$10.000</p>
            </div>
        </div>
    </div>
    <div class="col-md-2 mb-4">
        <div class="card h-100">
            <img src="{{ asset('img/banners/colecciones-destacadas/coleccion5.jpg') }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Producto 1</h5>
                <p class="card-text">$10.000</p>
            </div>
        </div>
    </div>

</div>
{{--
<div class="banners">
    <img src="{{ asset('img/banners/banner5.jpg') }}" alt="pagos">
</div>
--}}   
<br>
<br>

@endsection
