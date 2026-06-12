<nav class="navbar navbar-expand-sm bg-dark navbar-dark mi-navbar">
  <div class="container">
    <a class="navbar-brand" href="#">SportXpress</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/principal">PRINCIPAL</a>
        </li>  
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">CATÁLOGO DE PRODUCTOS</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/hombres">HOMBRES</a></li>
            <li><a class="dropdown-item" href="/mujeres">MUJERES</a></li>
          </ul>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="/quienes-somos">QUIÉNES SOMOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/comercializacion">COMERCIALIZACIÓN</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="/contactos">CONTACTOS</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="/terminos-y-usos">TÉRMINOS Y USOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/consultas">CONSULTAS</a>
        </li>
      </ul>
    </div>
           <div class="d-flex align-items-center gap-3">

    @php
        $carritoCount = auth()->check()
            ? (Auth::user()->carrito?->detalles()->sum('cantidad') ?? 0)
            : 0;
    @endphp

    <a href="{{ route('cliente.carrito') }}"
       class="text-white text-decoration-none position-relative">

        <i class="bi bi-cart3 fs-4"></i>

        <span class="badge bg-danger rounded-pill">{{ $carritoCount }}</span>
    </a>

    <div class="dropdown">
        <a class="text-white dropdown-toggle text-decoration-none"
           href="#"
           role="button"
           data-bs-toggle="dropdown">

            <i class="bi bi-person-circle fs-4"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
            <li><a class="dropdown-item" href="{{ route('roles.create') }}">Crear Rol</a></li>
            <li><a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a></li>
        </ul>
    </div>

</div>

    
</li>
</a>
</a>
          </div>
</nav>
