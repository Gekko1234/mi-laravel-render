<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\User;
use App\Models\Equipo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    // Mostrar la lista de préstamos
    public function index()
    {
        // Obtener todos los préstamos
        $prestamos = Prestamo::with('usuario', 'equipo')->get();
        return view('prestamos.index', compact('prestamos'));
    }

    // Crear un nuevo préstamo
    public function create()
    {
        // Obtener todos los usuarios y equipos
        $usuarios = User::all();
        $equipos = Equipo::all();

        // Pasar los usuarios y equipos a la vista
        return view('prestamos.create', compact('usuarios', 'equipos'));
    }

    // Almacenar un nuevo préstamo
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'equipo_id' => 'required|exists:equipos,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date',
            'observaciones' => 'nullable|string',
        ]);

        // Crear un nuevo préstamo
        Prestamo::create([
            'usuario_id' => $request->usuario_id,
            'equipo_id' => $request->equipo_id,
            'fecha_prestamo' => $request->fecha_prestamo,
            'fecha_devolucion' => $request->fecha_devolucion,
            'observaciones' => $request->observaciones,
        ]);

        // Redirigir a la lista de préstamos con un mensaje de éxito
        return redirect()->route('prestamos.index')->with('success', 'Préstamo creado correctamente.');
    }
}
