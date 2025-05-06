<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'apellidos',
        'cargo',
        'departamento',
        'telefono',
        'es_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'es_admin' => 'boolean',  // Aquí agregamos el campo 'es_admin' como booleano
        ];
    }

    /**
     * Relación con Prestamos.
     * Un usuario puede tener muchos préstamos.
     */
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}
