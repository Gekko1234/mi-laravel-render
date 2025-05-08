<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    // Mostrar lista de equipos
    public function index()
    {
        $equipos = Equipo::all(); // Se obtiene la lista de equipos sin la relación a "aula"
        return view('equipo.index', compact('equipos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('equipo.create'); // Aquí puedes mostrar la vista para crear un equipo
    }

    // Almacenar nuevo equipo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'marca' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'numero_serie' => 'nullable|string|max:255',
            'fecha_adquisicion' => 'nullable|date',
            'estado' => 'required|string|max:100',
        ]);
        

        Equipo::create($request->all());

        return redirect()->route('equipo.index')->with('success', 'Equipo creado correctamente.');
    }

    // Mostrar un equipo específico
    public function show($id)
    {
        $equipo = Equipo::findOrFail($id); // Ya no se hace uso de la relación 'aula'
        return view('equipo.show', compact('equipo'));
    }

    // Actualizar equipo
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'marca' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'numero_serie' => 'nullable|string|max:255',
            'fecha_adquisicion' => 'nullable|date',
            'estado' => 'required|string|max:100',
        ]);
        

        $equipo = Equipo::findOrFail($id);
        $equipo->update($request->all());

        return redirect()->route('equipo.index')->with('success', 'Equipo actualizado correctamente.');
    }

    // Eliminar equipo
    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();

        return redirect()->route('equipo.index')->with('success', 'Equipo eliminado correctamente.');
    }
}
