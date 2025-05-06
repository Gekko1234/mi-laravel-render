<?php

// app/Models/Prestamo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = ['equipo_id', 'user_id', 'fecha_prestamo', 'fecha_devolucion', 'observaciones'];

    // Relación con Usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
