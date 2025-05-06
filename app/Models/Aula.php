<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ala',
        'planta',
        'coordenadas', 
    ];

    protected $casts = [
        'coordenadas' => 'array', // coordenadas es un array (formato JSON)
    ];
}
