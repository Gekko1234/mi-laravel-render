<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Aula;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    // Mostrar lista de equipos
    public function index()
    {
        $equipos = Equipo::with('aula')->get(); // Incluye relación con Aula
        return view('equipo.index', compact('equipos'));
    }

    // Mostrar formulario para crear equipo
    public function create()
    {
        $aulas = Aula::all();
        return view('equipo.create', compact('aulas'));
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
            'aula_id' => 'required|exists:aulas,id',
        ]);

        Equipo::create($request->all());

        return redirect()->route('equipo.index')->with('success', 'Equipo creado correctamente.');
    }

    // Mostrar un equipo específico
    public function show($id)
    {
        $equipo = Equipo::with('aula')->findOrFail($id);
        return view('equipo.show', compact('equipo'));
    }

    // Mostrar formulario para editar equipo
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        $aulas = Aula::all();
        return view('equipo.edit', compact('equipo', 'aulas'));
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
            'aula_id' => 'required|exists:aulas,id',
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
