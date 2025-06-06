<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Préstamos de {{ $usuario->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/estilos_pdfs.css') }}">
</head>
<body>
    <h2>Préstamos de {{ $usuario->name }}</h2>

    @if ($prestamos->isEmpty())
        <p>No hay préstamos registrados en el último mes.</p>
    @else
        <table border="1px solid">
            <thead>
                <tr>
                    <th>Observaciones</th>
                    <th>Equipo</th>
                    <th>Fecha de Préstamo</th>
                    <th>Fecha de Devolución</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <td>
                            <div style="width: 200px; word-wrap: break-word; overflow-wrap: break-word; white-space: normal;">
                                {{ $prestamo->observaciones ?? 'N/A' }}
                            </div>
                        </td>  
                        <td>{{ $prestamo->equipo->nombre }}</td>
                        <td>{{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y') }}</td>
                        <td>{{ $prestamo->fecha_devolucion ? \Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y') : 'No devuelto' }}</td>                    
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
