<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Averías de {{ $equipo->nombre }}</title>
    <link rel="stylesheet" href="{{ asset('css/estilos_pdfs.css') }}">
</head>
<body>
    <h2>Averías de {{ $equipo->nombre }}</h2>

    @if ($averias->isEmpty())
        <p>No hay averías registradas en el último mes.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Resolución</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($averias as $averia)
                    <tr>
                        <td>{{ $averia->descripcion }}</td>
                        <td>{{ $averia->estado }}</td>
                        <td>{{ \Carbon\Carbon::parse($averia->fecha_creacion)->format('d/m/Y') }}</td>
                        <td>{{ $averia->fecha_resolucion ? \Carbon\Carbon::parse($averia->fecha_resolucion)->format('d/m/Y') : 'Pendiente' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
