<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mi App')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS propio -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('head')
    <!-- Otros estilos o scripts -->
</head>

<head>
    
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <!-- Enlace al inicio -->
            <a class="navbar-brand" href="{{ url('/') }}">Inicio</a>

            <!-- Botón toggler para móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido colapsable -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item d-flex align-items-center">
                            <span class="nav-link disabled text-light mb-0">| {{ Auth::user()->name }} |</span>
                        </li>                    
                        @if(Auth::user()->es_admin || Auth::user()->cargo === 'Profesor')
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('admin.panel') }}">Panel de Administración</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('aulas.mapa') }}">Ver mapa de aulas</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link text-light">Cerrar sesión</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('login') }}">Iniciar sesión</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


    <!-- Contenido de cada página -->
    <div class="container">
        @yield('content') <!-- Aquí se insertarán las páginas específicas -->
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts adicionales desde Blade hijo -->
    @yield('scripts')
</body>
</html>
