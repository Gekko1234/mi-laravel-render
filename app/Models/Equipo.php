<?php

// app/Models/Equipo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'marca', 'modelo', 'numero_serie', 'fecha_adquisicion', 'estado',];

    // Relación con Prestamos
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    // Relación con Averias
    public function averias()
    {
        return $this->hasMany(Averia::class);
    }

}

