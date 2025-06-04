@extends('layouts.app')

@section('title', 'Préstamos')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Préstamos</h1>

    <div class="d-flex mb-3">
        <a href="{{ route('prestamos.create') }}" class="btn btn-success">Crear Préstamo</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Usuario</th>
                    <th>Equipo</th>
                    <th>Fecha de Préstamo</th>
                    <th>Fecha de Devolución</th>
                    <th>Observaciones</th>
                    <th>Estado</th> 
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                    @php
                        $esFinalizado = $prestamo->estado === 'Sin prestar';
                        $estadoTexto = $esFinalizado ? 'Finalizado' : $prestamo->estado;
                        $badgeClass = $esFinalizado ? 'success' : 'warning';
                    @endphp
                    <tr>
                        <td>
                            <a href="{{ route('usuarios.prestamos', $prestamo->user->id) }}">
                                {{ $prestamo->user->name }}
                            </a>
                        </td>
                        <td>{{ $prestamo->equipo->nombre }}</td>
                        <td>{{ $prestamo->fecha_prestamo }}</td>
                        <td>{{ $prestamo->fecha_devolucion ?? 'No devuelto' }}</td>
                        <td>{{ $prestamo->observaciones ?? 'N/A' }}</td>
                        <td><span class="badge bg-{{ $badgeClass }}">{{ $estadoTexto }}</span></td>
                        <td class="text-center">
                            <a href="{{ route('prestamos.edit', $prestamo->id) }}" class="btn btn-sm btn-primary me-1">Editar</a>

                            <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este préstamo?')">Eliminar</button>
                            </form>

                            @if($prestamo->estado === 'Prestado')
                                <form action="{{ route('prestamos.finalizar', $prestamo->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">Finalizar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.panel') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection
