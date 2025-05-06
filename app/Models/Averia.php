<?php

// app/Models/Averia.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Averia extends Model
{
    use HasFactory;

    protected $fillable = ['equipo_id', 'fecha_reporte', 'descripcion', 'estado', 'fecha_resolucion', 'tecnico_id'];

    // Relación con Equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    // Relación con Técnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    // Relación con Historial de Reparaciones
    public function historialReparaciones()
    {
        return $this->hasMany(HistorialReparacion::class);
    }

}

