@extends('layouts.app')

@section('title', 'Ficha del Técnico')

@section('content')
    <div class="container mt-4">
        <h2>Ficha del Técnico</h2>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">{{ $tecnico->nombre }}</h5>
                <p><strong>Especialidad:</strong> {{ $tecnico->especialidad }}</p>
                <p><strong>Contacto:</strong> {{ $tecnico->contacto }}</p>

                <a href="{{ route('tecnicos.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection
