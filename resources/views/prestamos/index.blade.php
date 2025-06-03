@extends('layouts.app')

@section('title', 'Préstamos')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Préstamos</h1>

        <a href="{{ route('prestamos.create') }}" class="btn btn-success mb-3">Crear Préstamo</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Equipo</th>
                    <th>Fecha de Préstamo</th>
                    <th>Fecha de Devolución</th>
                    <th>Observaciones</th>
                    <th>Estado</th> 
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
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
                        <td>{{ $prestamo->estado === 'Sin prestar' ? 'Finalizado' : $prestamo->estado }}</td> <!-- Si el estado es sin prestar que ponga finalizado -->
                        <td>
                            <a href="{{ route('prestamos.edit', $prestamo->id) }}" class="btn btn-primary">Editar</a>

                            <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este préstamo?')">Eliminar</button>
                            </form>

                            @if($prestamo->estado === 'Prestado')
                                <form action="{{ route('prestamos.finalizar', $prestamo->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Finalizar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.panel') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
@endsection
