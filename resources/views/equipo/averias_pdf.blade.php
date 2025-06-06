<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Averías de {{ $equipo->nombre }}</title>
    <link rel="stylesheet" href="{{ public_path('css/estilos_pdfs.css') }}">

</head>
<body>
    <h2>Averías de {{ $equipo->nombre }}</h2>

    @if ($averias->isEmpty())
        <p>No hay averías registradas en el último mes.</p>
    @else
        <table class="table table-striped table-bordered datatable" border="1px solid">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Resolución</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($averias as $averia)
                    <tr>
                        <td>
                            <div style="width: 200px; word-wrap: break-word; overflow-wrap: break-word; white-space: normal;">
                                {{ $averia->descripcion }}
                            </div>
                        </td>                        
                        <td>{{ \Carbon\Carbon::parse($averia->fecha_creacion)->format('d/m/Y') }}</td>
                        <td>{{ $averia->fecha_resolucion ? \Carbon\Carbon::parse($averia->fecha_resolucion)->format('d/m/Y') : 'Pendiente' }}</td>
                        <td>{{ $averia->estado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
