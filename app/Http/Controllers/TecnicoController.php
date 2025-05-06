<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    // Mostrar la lista de técnicos
    public function index()
    {
        $tecnicos = Tecnico::all();
        return view('tecnicos.index', compact('tecnicos'));
    }

    // Crear un nuevo técnico
    public function create()
    {
        return view('tecnicos.create');
    }

    // Almacenar un nuevo técnico
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
        ]);

        // Crear un nuevo técnico
        Tecnico::create([
            'nombre' => $request->nombre,
            'especialidad' => $request->especialidad,
            'contacto' => $request->contacto,
        ]);

        // Redirigir a la lista de técnicos con un mensaje de éxito
        return redirect()->route('tecnicos.index')->with('success', 'Técnico creado correctamente.');
    }

    // Mostrar el formulario para editar un técnico
    public function edit($id)
    {
        $tecnico = Tecnico::findOrFail($id);
        return view('tecnicos.edit', compact('tecnico'));
    }

    // Actualizar un técnico existente
    public function update(Request $request, $id)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
        ]);

        $tecnico = Tecnico::findOrFail($id);

        // Actualizar los datos del técnico
        $tecnico->update([
            'nombre' => $request->nombre,
            'especialidad' => $request->especialidad,
            'contacto' => $request->contacto,
        ]);

        // Redirigir a la lista de técnicos con un mensaje de éxito
        return redirect()->route('tecnicos.index')->with('success', 'Técnico actualizado correctamente.');
    }

    // Eliminar un técnico
    public function destroy($id)
    {
        $tecnico = Tecnico::findOrFail($id);
        $tecnico->delete();

        // Redirigir a la lista de técnicos con un mensaje de éxito
        return redirect()->route('tecnicos.index')->with('success', 'Técnico eliminado correctamente.');
    }
}
