@extends('layouts.app')

@section('title', 'Listado de Equipos')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Listado de Equipos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('equipo.create') }}" class="btn btn-success">Crear nuevo equipo</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Estado</th>
                    <th>Localización</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->nombre }}</td>
                        <td>{{ $equipo->marca }}</td>
                        <td>{{ $equipo->modelo }}</td>
                        <td>
                            @php
                                $estado = strtolower($equipo->estado);
                                $badgeClass = match($estado) {
                                    'disponible' => 'success',
                                    'en uso', 'en reparación', 'en reparacion' => 'warning',
                                    'dado de baja', 'baja' => 'danger',
                                    default => 'secondary',
                                };
                            @endphp
                            <span class="badge bg-{{ $badgeClass }}">
                                {{ ucfirst($equipo->estado) }}
                            </span>
                        </td>
                        <td>{{ $equipo->aula ? $equipo->aula->nombre . ' (Planta ' . $equipo->aula->planta . ')' : 'Sin asignar' }}</td>
                        <td class="text-center">
                            <a href="{{ route('equipo.show', $equipo->id) }}" class="btn btn-sm btn-info me-1">Ver</a>
                            <a href="{{ route('equipo.edit', $equipo->id) }}" class="btn btn-sm btn-warning me-1">Editar</a>
                            <form action="{{ route('equipo.destroy', $equipo->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Estás seguro de eliminar este equipo?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 text-end">
        <a href="{{ route('admin.panel') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection
