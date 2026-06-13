<nav class="navbar navbar-expand-xl bg-dark navbar-dark mi-navbar">
  <div class="container-fluid px-4">
    <a class="navbar-brand" href="#">SportXpress</a>
    
    <!-- CONTENEDOR DE ÍCONOS PARA CELULARES (Se ve en pantallas chicas, se oculta en XL) -->
    <div class="d-flex align-items-center gap-3 ms-auto me-3 d-xl-none">
        @php
            $carritoCount = auth()->check() ? (Auth::user()->carrito?->detalles()->sum('cantidad') ?? 0) : 0;
        @endphp
        @auth
        @if(Auth::user()->rol->nombre == 'cliente')
        <a href="{{ route('cliente.carrito') }}" class="text-white text-decoration-none position-relative">
            <i class="bi bi-cart3 fs-4"></i>
            <span class="badge bg-danger rounded-pill">{{ $carritoCount }}</span>
        </a>
        @endif
        @endauth
        <div class="dropdown">
            <a class="text-white dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle fs-4"></i>
                @auth
                  <span class="ms-1">
                  {{ Auth::user()->name }}
                  </span>
                @endauth
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesión</a></li>
                <li><a class="dropdown-item" href="{{ route('roles.create') }}">Registrarse</a></li>
            </ul>
        </div>
    </div>

    <!-- Botón Hamburguesa -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Contenedor Colapsable -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mx-xl-auto text-nowrap">
              <li class="nav-item"><a class="nav-link" href="/principal">PRINCIPAL</a></li>  
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">CATÁLOGO DE PRODUCTOS</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/hombres">HOMBRES</a></li>
                    <li><a class="dropdown-item" href="/mujeres">MUJERES</a></li>
                  </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="/quienes-somos">QUIÉNES SOMOS</a></li>
              <li class="nav-item"><a class="nav-link" href="/comercializacion">COMERCIALIZACIÓN</a></li>
              <li class="nav-item"><a class="nav-link" href="/contactos">CONTACTOS</a></li>
              <li class="nav-item"><a class="nav-link" href="/terminos-y-usos">TÉRMINOS Y USOS</a></li>
              <li class="nav-item"><a class="nav-link" href="/consultas">CONSULTAS</a></li>
      </ul>
    
      <!-- CONTENEDOR DE ÍCONOS PARA COMPUTADORAS (Se oculta en pantallas chicas, se ve en XL) -->
      <div class="d-none d-xl-flex align-items-center gap-3">
        @auth
        @if(Auth::user()->rol->nombre == 'cliente')
          <a href="{{ route('cliente.carrito') }}" class="text-white text-decoration-none position-relative">
              <i class="bi bi-cart3 fs-4"></i>
              <span class="badge bg-danger rounded-pill">{{ $carritoCount }}</span>
          </a>
        @endif
        @endauth  
          <div class="dropdown">
              <a class="text-white dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="bi bi-person-circle fs-4"></i>
                  @auth
                    <span class="ms-1">
                      {{ Auth::user()->name }}
                    </span>
                  @endauth
              </a>
              <ul class="dropdown-menu dropdown-menu-end">

                @guest

                    <li>
                        <a class="dropdown-item"
                          href="{{ route('login.form') }}">
                            Iniciar Sesión
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item"
                          href="{{ route('registro.form') }}">
                            Registrarse
                        </a>
                    </li>

                @endguest


                @auth

                    @if(Auth::user()->rol->nombre == 'cliente')

                        <li>
                            <a class="dropdown-item"
                              href="{{ route('cliente.dashboard') }}">
                                Mi Cuenta
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                              href="{{ route('cliente.carrito') }}">
                                Mi Carrito
                            </a>
                        </li>

                    @endif


                    @if(Auth::user()->rol->nombre == 'admin')

                        <li>
                            <a class="dropdown-item"
                              href="{{ route('admin.dashboard') }}">
                                Panel Admin
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                              href="{{ route('usuarios.index') }}">
                                Usuarios
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                              href="{{ route('roles.index') }}">
                                Roles
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                              href="{{ route('categorias.index') }}">
                                Categorías
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                              href="{{ route('productos.index') }}">
                                Productos
                            </a>
                        </li>

                    @endif

                    <li><hr class="dropdown-divider"></li>

                    <li>

                        <form action="{{ route('logout') }}"
                              method="POST">

                            @csrf

                            <button type="submit"
                                    class="dropdown-item">

                                Cerrar Sesión

                            </button>

                        </form>

                    </li>

                @endauth

            </ul>
          </div>
      </div>

    </div> <!-- Cierre del collapse -->
  </div>
</nav>


