<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso Denegado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/acceso_denegado.css') }}" rel="stylesheet">
</head>
<body>
    <div class="card">
        <h1 class="text-danger mb-4">Acceso Denegado</h1>
        <div class="alert alert-danger">
            Web exclusiva para profesores y personal autorizado del centro.
        </div>
        <a href="{{ route('login') }}" class="btn btn-primary mt-3">
            <img src="{{ asset('images/volver.png') }}" alt="Editar" style="width: 15px; height: 15px; margin-right: 5px;">Volver al inicio de sesión
        </a>
    </div>
</body>
</html>
