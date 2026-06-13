<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>@yield('titulo') | SportXpress</title>
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="/css/estilos.css">
</head>
<body>
    {{-- HEADER 
    @include('partials.header')--}}
    
    
    {{-- NAVBAR --}}
    @include('partials.navbar')


    {{-- CONTENIDO DINÁMICO --}}
    <main class="container mt-4">
        @yield('content')
    </main>
    

    {{-- FOOTER --}}
    @include('partials.footer')
    

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>
</html>