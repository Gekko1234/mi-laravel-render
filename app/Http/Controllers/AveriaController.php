<?php

namespace App\Http\Controllers;

use App\Models\Averia;
use App\Models\Equipo;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AveriaController extends Controller
{
    // Mostrar la lista de averías
    public function index()
    {
        $averias = Averia::all();
        return view('averias.index', compact('averias'));
    }
    

    // Crear una nueva avería
    public function create()
    {
        // Obtener los equipos y técnicos disponibles
        $equipos = Equipo::all();
        $tecnicos = Tecnico::all();
        
        return view('averias.create', compact('equipos', 'tecnicos'));
    }

    // Almacenar una nueva avería
    public function store(Request $request)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'descripcion' => 'required|string',
        ]);

        $averia = Averia::create([
            'equipo_id' => $request->equipo_id,
            'descripcion' => $request->descripcion,
            'estado' => 'Pendiente',
            'fecha_creacion' => now(),
        ]);

        // Cambiar estado del equipo a "En reparación"
        $averia->equipo->update(['estado' => 'En reparación']);

        return redirect()->route('averias.index')->with('success', 'Avería registrada y equipo marcado en reparación.');
    }

    // Mostrar el formulario para editar una avería
    public function edit($id)
    {
        $averia = Averia::findOrFail($id);
        $equipos = Equipo::all();
        $tecnicos = Tecnico::all();

        return view('averias.edit', compact('averia', 'equipos', 'tecnicos'));
    }

    // Actualizar una avería existente
    public function update(Request $request, $id)
    {
        // Validación de los datos del formulario
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'descripcion' => 'required|string|max:500',
            'estado' => 'required|string|max:100',
            'fecha_resolucion' => 'nullable|date',
            'tecnico_id' => 'nullable|exists:tecnicos,id',
        ]);

        $averia = Averia::findOrFail($id);

        // Actualizar los datos de la avería
        $averia->update([
            'equipo_id' => $request->equipo_id,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'fecha_resolucion' => $request->fecha_resolucion,
            'tecnico_id' => $request->tecnico_id,
        ]);

        // Redirigir a la lista de averías con un mensaje de éxito
        return redirect()->route('averias.index')->with('success', 'Avería actualizada correctamente.');
    }

    // Eliminar una avería
    public function destroy($id)
    {
        $averia = Averia::findOrFail($id);
        $averia->delete();

        // Redirigir a la lista de averías con un mensaje de éxito
        return redirect()->route('averias.index')->with('success', 'Avería eliminada correctamente.');
    }

    // Metodo del boton de finalizar
    public function finalizar($id)
    {
        $averia = Averia::findOrFail($id);

        $averia->estado = 'Resuelto';
        $averia->fecha_resolucion = now();
        $averia->save();

        // Opcional: marcar equipo como "Disponible"
        $equipo = $averia->equipo;
        $equipo->estado = 'Disponible';
        $equipo->save();

        return redirect()->back()->with('success', 'Avería finalizada.');
    }

}
