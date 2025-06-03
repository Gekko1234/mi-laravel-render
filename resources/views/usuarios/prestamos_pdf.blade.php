<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Préstamos de {{ $usuario->name }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Préstamos de {{ $usuario->name }}</h2>

    @if ($prestamos->isEmpty())
        <p>No hay préstamos registrados en el último mes.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Equipo</th>
                    <th>Fecha de Préstamo</th>
                    <th>Fecha de Devolución</th>
                    <th>Observaciones</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->equipo->nombre }}</td>
                        <td>{{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y H:i') }}</td>
                        <td>{{ $prestamo->fecha_devolucion ? \Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y H:i') : 'No devuelto' }}</td>
                        <td>{{ $prestamo->observaciones ?? 'N/A' }}</td>
                        <td>{{ $prestamo->estado === 'Sin prestar' ? 'Finalizado' : $prestamo->estado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
