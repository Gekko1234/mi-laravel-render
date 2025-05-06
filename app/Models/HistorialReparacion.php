<?php

// app/Models/HistorialReparacion.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialReparacion extends Model
{
    use HasFactory;

    protected $fillable = ['averia_id', 'tecnico_id', 'fecha_inicio', 'fecha_finalizacion', 'descripcion_reparacion', 'coste'];

    // Relación con Averia
    public function averia()
    {
        return $this->belongsTo(Averia::class);
    }

    // Relación con Técnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }
}

