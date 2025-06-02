@extends('layouts.app')

@section('title', 'Lista de Averías')

@section('content')
    <h1 class="mb-4">Lista de Averías</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('averias.create') }}" class="btn btn-success mb-3">Crear nueva averia</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Equipo</th>
                <th>Técnico</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha Creación</th>
                <th>Fecha Resolución</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($averias as $averia)
                <tr>
                    <td>{{ $averia->equipo->nombre }}</td>
                    <td>{{ $averia->tecnico?->nombre ?? 'Sin asignar' }}</td>
                    <td>{{ Str::limit($averia->descripcion, 40) }}</td>
                    <td>{{ $averia->estado }}</td>
                    <td>{{ $averia->fecha_creacion ? $averia->fecha_creacion->format('d/m/Y H:i') : '—' }}</td>
                    <td>{{ $averia->fecha_resolucion ?? 'Pendiente' }}</td>
                    <td>
                        <a href="{{ route('averias.edit', $averia->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('averias.destroy', $averia->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('¿Estás seguro de eliminar esta averia?')">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                        @if($averia->equipo->estado === 'En reparación')
                            <form action="{{ route('averias.finalizar', $averia->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('¿Finalizar esta avería?')">Finalizar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.panel') }}" class="btn btn-secondary">Volver</a>
@endsection
