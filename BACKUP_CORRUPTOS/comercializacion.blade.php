@extends('layouts.plantilla-base')
@section('titulo', 'COMERCIALIZACION')
@section('content')

<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/banners/carrousel-comercializacion/carrousel21.jpg" class="d-block w-100" alt="LogotiposMarcas">
    </div>
    <div class="carousel-item">
      <img src="img/banners/carrousel-comercializacion/carrousel23.jpg" class="d-block w-100" alt="EnviosAdomicilio">
      <div class="carousel-caption d-none d-md-block">
        <h5>De la tienda a tu hogar</h5>
        <p>Envios a domicilio desde cualquier parte de Argentina</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/banners/carrousel-comercializacion/carrousel19.jpg" class="d-block w-100" alt="mediosdepagos">
      <div class="carousel-caption d-none d-md-block">
        <h5>Con todos los medios de pagos</h5>
        <p>Paga en cómodas cuotas y con el medio de pago que quieras.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br>
<br>

<div class="row row justify-content-center g-4">

<div class="col-md-3 mb-4">
<div class="card" style="width: 18rem;">
  <div class="card-body mi-card-comercializacion">
    <h5 class="card-title">Pagos      
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back" viewBox="0 0 16 16">
        <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5z"/>
        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1m-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1"/>
        </svg>
    </h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Formas y Metodos de pagos</h6>
    <p class="card-text">Cuotas, tarjetas, y billeteras virtuales</p>
    <a href="{{ route('pagos') }}" class="card-link">Ver más</a>  </div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card" style="width: 18rem;">
  <div class="card-body mi-card-comercializacion">
    <h5 class="card-title">Envios
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
        </svg>
    </h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Formas y Metodos de envíos</h6>
    <p class="card-text">Preparación de paquetes, despacho, y seguimiento</p>
    <a href="{{ route('envios') }}" class="card-link">Ver más</a>  </div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card" style="width: 18rem;">
  <div class="card-body mi-card-comercializacion">
    <h5 class="card-title">Entregas
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
        </svg>
    </h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Tipos de entregas</h6>
     <p class="card-text">Lugares de recoleccion y horarios de entrega </p> 
<a href="{{ route('entregas') }}" class="card-link">Ver más</a>  </div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card" style="width: 18rem;">
  <div class="card-body mi-card-comercializacion">
    <h5 class="card-title">Devoluciones
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
        </svg>
    </h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Como devolver el pedido</h6>
    <p class="card-text">Paquete en mal estado o no coincide con lo que pedí</p>
    <a href="{{ route('devoluciones') }}" class="card-link">Ver más</a>
  </div>
</div>
</div>

</div>

<br><br>
@endsection