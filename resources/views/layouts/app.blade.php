<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personas</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS propio (opcional) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    
    <!-- Navbar -->
    <div class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <!-- Enlace al inicio -->
            <a class="navbar-brand" href="{{ url('/') }}">Inicio</a>
            
            <div class="navbar-nav ms-auto">
                <!-- Si el usuario está autenticado, muestra los siguientes elementos -->
                @auth
                    <span class="navbar-text text-light me-3">| {{ Auth::user()->name }} |</span>

                    <!-- Si es admin o profesor, muestra el panel de administración -->
                    @if(Auth::check() && (Auth::user()->es_admin || Auth::user()->cargo === 'Profesor'))
                        <a class="nav-link text-light" href="{{ route('admin.panel') }}">Panel de Administración</a>
                    @endif

                    
                    <!-- Botón de Cerrar sesión -->
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link text-light">Cerrar sesión</button>
                    </form>
                @else
                    <!-- Si no está autenticado, muestra el enlace de login -->
                    <a class="nav-link text-light" href="{{ route('login') }}">Iniciar sesión</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Contenido de cada página -->
    <div class="container">
        @yield('content') <!-- Aquí se insertarán las páginas específicas -->
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
