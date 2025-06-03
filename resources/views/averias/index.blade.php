@extends('layouts.app')

@section('title', 'Lista de Averías')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Lista de Averías</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('averias.create') }}" class="btn btn-success">Crear nueva avería</a>
        <a href="{{ route('admin.panel') }}" class="btn btn-secondary">Volver</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
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
                        <td>
                            <a href="{{ route('equipos.averias', $averia->equipo->id) }}">
                                {{ $averia->equipo->nombre }}
                            </a>
                        </td>
                        <td>{{ $averia->tecnico?->nombre ?? 'Sin asignar' }}</td>
                        <td>{{ Str::limit($averia->descripcion, 40) }}</td>
                        <td>
                            <span class="badge bg-{{ $averia->estado === 'Resuelto' ? 'success' : 'warning' }}">
                                {{ $averia->estado }}
                            </span>
                        </td>
                        <td>{{ $averia->fecha_creacion ? $averia->fecha_creacion->format('d/m/Y') : '—' }}</td>
                        <td>{{ $averia->fecha_resolucion ?? 'Pendiente' }}</td>
                        <td>
                            <div class="d-flex flex-column flex-sm-row gap-1">
                                <a href="{{ route('averias.edit', $averia->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                
                                <form action="{{ route('averias.destroy', $averia->id) }}" method="POST"
                                      onsubmit="return confirm('¿Estás seguro de eliminar esta avería?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>

                                @if($averia->estado !== 'Resuelto')
                                    <form action="{{ route('averias.finalizar', $averia->id) }}" method="POST"
                                          onsubmit="return confirm('¿Finalizar esta avería?')">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Finalizar</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
