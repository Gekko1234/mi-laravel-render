@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
    <h1 class="text-center mt-4">Panel de Administración</h1>

    <div class="container mt-5">
        <div class="row">
            {{-- Opciones disponibles para TODOS (Profesores y Administradores) --}}
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Ver Usuarios</h5>
                        <hr class="my-2">
                        <p class="card-text">Consulta, edita o elimina usuarios.</p>
                        <a href="{{ route('usuarios.index') }}" class="btn btn-outline-primary">Ver Usuarios</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Ver Técnicos</h5>
                        <hr class="my-2">
                        <p class="card-text">Consulta la lista de técnicos disponibles.</p>
                        <a href="{{ route('tecnicos.index') }}" class="btn btn-outline-primary">Ver Técnicos</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Ver Averías</h5>
                        <hr class="my-2">
                        <p class="card-text">Revisa las averías registradas en el sistema.</p>
                        <a href="{{ route('averias.index') }}" class="btn btn-outline-primary">Ver Averías</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Ver Equipos</h5>
                        <hr class="my-2">
                        <p class="card-text">Consulta el inventario de equipos disponibles.</p>
                        <a href="{{ route('equipo.index') }}" class="btn btn-outline-primary">Ver Equipos</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Ver Préstamos</h5>
                        <hr class="my-2">
                        <p class="card-text">Revisa los préstamos realizados.</p>
                        <a href="{{ route('prestamos.index') }}" class="btn btn-outline-primary">Ver Préstamos</a>
                    </div>
                </div>
            </div>


            {{-- SOLO PARA ADMINISTRADORES --}}
            @if(Auth::user()->es_admin)
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-success">
                        <div class="card-body text-center">
                            <h5 class="card-title text-muted">Crear Usuario</h5>
                            <hr class="my-2">
                            <p class="card-text">Agrega nuevos usuarios al sistema.</p>
                            <a href="{{ route('usuarios.create') }}" class="btn btn-success">Crear Usuario</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-success">
                        <div class="card-body text-center">
                            <h5 class="card-title text-muted">Crear Técnico</h5>
                            <hr class="my-2">
                            <p class="card-text">Agrega nuevos técnicos al sistema.</p>
                            <a href="{{ route('tecnicos.create') }}" class="btn btn-success">Crear Técnico</a>
                        </div>
                    </div>
                </div>

            
            @endif

            {{-- Crear Avería, Prestamo, Equipo (permitido a profesores también) --}}
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-success">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Crear Avería</h5>
                        <hr class="my-2">
                        <p class="card-text">Registra una nueva avería.</p>
                        <a href="{{ route('averias.create') }}" class="btn btn-success">Crear Avería</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-success">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Crear Equipo</h5>
                        <hr class="my-2">
                        <p class="card-text">Registra un nuevo equipo en el sistema.</p>
                        <a href="{{ route('equipo.create') }}" class="btn btn-success">Crear Equipo</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-success">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Crear Préstamo</h5>
                        <hr class="my-2">
                        <p class="card-text">Realiza un nuevo préstamo de equipo.</p>
                        <a href="{{ route('prestamos.create') }}" class="btn btn-success">Crear Préstamo</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
