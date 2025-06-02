<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Averia extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipo_id',
        'fecha_reporte',
        'descripcion',
        'estado',
        'fecha_creacion',
        'fecha_resolucion',
        'tecnico_id'
    ];

    protected $casts = [
        'fecha_creacion' => 'datetime',
        'fecha_resolucion' => 'datetime',
    ];

    // Relaciones...
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    public function historialReparaciones()
    {
        return $this->hasMany(HistorialReparacion::class);
    }
}
