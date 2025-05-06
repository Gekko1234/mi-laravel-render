<?php

// app/Models/Tecnico.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'especialidad', 'contacto'];

    // Relación con Averias
    public function averias()
    {
        return $this->hasMany(Averia::class);
    }

    // Relación con Historial de Reparaciones
    public function historialReparaciones()
    {
        return $this->hasMany(HistorialReparacion::class);
    }
}

