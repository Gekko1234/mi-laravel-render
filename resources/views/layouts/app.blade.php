<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mi App')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/jpg">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS propio -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    @stack('head')
</head>

<head>
    
</head>
<body class="d-flex flex-column min-vh-100">
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <!-- Enlace al inicio -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.jpg') }}" width="80px">
            </a>

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
                            <span class="nav-link disabled text-light mb-0">
                                <img src="{{ asset('images/usuario.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">
                                {{ Auth::user()->name }}
                            </span>
                        </li>                    
                        @if(Auth::user()->es_admin || Auth::user()->cargo === 'Profesor')
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('admin.panel') }}">
                                    <img src="{{ asset('images/administracion.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Panel de Administración</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('aulas.mapa') }}">
                                    <img src="{{ asset('images/mapa.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Ver mapa de aulas</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link text-light">                                
                                    <img src="{{ asset('images/cerrar-sesion.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Cerrar sesión
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('login') }}">
                                <img src="{{ asset('images/iniciar-sesion.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Iniciar sesión
                            </a>
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

    <!-- Footer -->
    <footer class="bg-primary text-light py-4 mt-auto">
        <div class="container text-center">
            <small>&copy; {{ date('Y') }} Germán Melguizo Puerta</small>
        </div>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery (requerido por DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


    <!-- Scripts adicionales desde Blade hijo -->
    @stack('scripts')
</body>
</html>
