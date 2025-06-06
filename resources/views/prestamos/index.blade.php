@extends('layouts.app')

@section('title', 'Préstamos')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Préstamos</h1>

    <div class="d-flex mb-3">
        <a href="{{ route('prestamos.create') }}" class="btn btn-success">Crear Préstamo</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle datatable">
            <thead class="table-light">
                <tr>
                    <th>Usuario</th>
                    <th>Equipo</th>
                    <th>Fecha de Préstamo</th>
                    <th>Fecha de Devolución</th>
                    <th>Detalles</th>
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
                            <a href="{{ route('usuarios.prestamos', $prestamo->user->id) }}" class="enlace-sin-estilo">
                                {{ $prestamo->user->name }}
                            </a>
                        </td>
                        <td>{{ $prestamo->equipo->nombre }}</td>
                        <td>{{ $prestamo->fecha_prestamo }}</td>
                        <td>{{ $prestamo->fecha_devolucion ?? 'No devuelto' }}</td>
                        <td>{{ Str::limit($prestamo->observaciones, 20) }}</td>
                        <td><span class="badge bg-{{ $badgeClass }}">{{ $estadoTexto }}</span></td>
                        <td>
                            <div class="d-flex flex-column flex-lg-row gap-2">
                                <a href="{{ route('prestamos.edit', $prestamo->id) }}" class="btn btn-sm btn-warning d-flex align-items-center">
                                    <img src="{{ asset('images/editar.png') }}" alt="Editar" style="width: 20px; height: 20px; margin-right: 5px;">
                                    Editar
                                </a>
                        
                                <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este préstamo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center">
                                        <img src="{{ asset('images/marca-x.png') }}" alt="Borrar" style="width: 20px; height: 20px; margin-right: 5px;">
                                        Borrar
                                    </button>
                                </form>
                        
                                @if($prestamo->estado === 'Prestado')
                                    <form action="{{ route('prestamos.finalizar', $prestamo->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <img src="{{ asset('images/tick.png') }}" alt="Borrar" style="width: 15px; height: 15px; margin-right: 5px;">Acabar
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                                              
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.panel') }}" class="btn btn-secondary mb-3">
            <img src="{{ asset('images/volver.png') }}" alt="Editar" style="width: 15px; height: 15px; margin-right: 5px;">Volver
        </a>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/datatables-config.js') }}"></script>
@endpush
