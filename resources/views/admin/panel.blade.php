@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
    <h1 class="text-center mt-4">Panel de Administración</h1>

    <div class="container mt-5">
        <div class="row">

            {{-- Usuarios --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Usuarios</h5>
                        <hr class="my-2">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-outline-primary">
                            <img src="{{ asset('images/vigilante.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Ver Usuarios
                        </a>
                        @if(Auth::user()->es_admin)
                            <a href="{{ route('usuarios.create') }}" class="btn btn-success">
                                <img src="{{ asset('images/mas.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Crear Usuario
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Técnicos --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Técnicos</h5>
                        <hr class="my-2">
                        <a href="{{ route('tecnicos.index') }}" class="btn btn-outline-primary">
                            <img src="{{ asset('images/vigilante.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Ver Técnicos
                        </a>
                        @if(Auth::user()->es_admin)
                            <a href="{{ route('tecnicos.create') }}" class="btn btn-success">
                                 <img src="{{ asset('images/mas.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Crear Técnico
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Averías --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Averías</h5>
                        <hr class="my-2">
                        <a href="{{ route('averias.index') }}" class="btn btn-outline-primary">
                            <img src="{{ asset('images/vigilante.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Ver Averías
                        </a>
                        <a href="{{ route('averias.create') }}" class="btn btn-success">
                             <img src="{{ asset('images/mas.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Crear Avería
                        </a>
                    </div>
                </div>
            </div>

            {{-- Equipos --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Equipos</h5>
                        <hr class="my-2">
                        <a href="{{ route('equipo.index') }}" class="btn btn-outline-primary">
                            <img src="{{ asset('images/vigilante.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Ver Equipos
                        </a>
                        <a href="{{ route('equipo.create') }}" class="btn btn-success">
                             <img src="{{ asset('images/mas.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Crear Equipo
                        </a>
                    </div>
                </div>
            </div>

            {{-- Préstamos --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Préstamos</h5>
                        <hr class="my-2">
                        <a href="{{ route('prestamos.index') }}" class="btn btn-outline-primary">
                            <img src="{{ asset('images/vigilante.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Ver Préstamos
                        </a>
                        <a href="{{ route('prestamos.create') }}" class="btn btn-success"> 
                            <img src="{{ asset('images/mas.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Crear Préstamo
                        </a>
                    </div>
                </div>
            </div>

            {{-- Aulas --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Aulas</h5>
                        <hr class="my-2">
                        <a href="{{ route('aulas.index') }}" class="btn btn-outline-primary">
                            <img src="{{ asset('images/vigilante.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Ver Aulas
                        </a>
                        <a href="{{ route('aulas.create') }}" class="btn btn-success">
                            <img src="{{ asset('images/mas.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Crear Aula
                        </a>
                        <a href="{{ route('aulas.mapa') }}" class="btn btn-secondary">
                            <img src="{{ asset('images/mapa.png') }}" alt="Usuario" style="width: 20px; height: 20px; margin-right: 5px;">Ver Mapa
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
