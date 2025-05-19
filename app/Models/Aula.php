<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'planta', 'pos_x', 'pos_y'];

    // Relación con equipos
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}
