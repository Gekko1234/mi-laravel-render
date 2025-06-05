<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Aula;
use Illuminate\Http\Request;
use App\Http\Controllers\PrestamoController;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;




class EquipoController extends Controller
{
    // Mostrar lista de equipos con aula
    public function index()
    {
        $equipos = Equipo::with('aula')->get();
        return view('equipo.index', compact('equipos'));
    }

    // Mostrar formulario de creación con listado de aulas
    public function create()
    {
        $aulas = Aula::all();
        return view('equipo.create', compact('aulas'));
    }

    // Almacenar nuevo equipo con aula_id
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

    // Mostrar formulario de edición con equipo y aulas
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        $aulas = Aula::all();
        return view('equipo.edit', compact('equipo', 'aulas'));
    }

    // Actualizar equipo con aula_id
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

    // Mostrar detalle de un equipo con aula
    public function show($id)
    {
        $equipo = Equipo::with('aula')->findOrFail($id);
        return view('equipo.show', compact('equipo'));
    }

    // Eliminar equipo
    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();

        return redirect()->route('equipo.index')->with('success', 'Equipo eliminado correctamente.');
    }

    public function verAverias(Equipo $equipo)
{
    // Trae todas las averías sin filtro de fecha para que el filtro se haga en el frontend
    $averias = $equipo->averias()
        ->orderByDesc('fecha_creacion')
        ->get();

    return view('equipo.averias', compact('equipo', 'averias'));
}


    // Descargar el pdf del equipo
    public function descargarAveriasPdf($equipoId)
    {
        $equipo = Equipo::findOrFail($equipoId);

        $fechaInicio = now()->subMonth();
        $averias = $equipo->averias()->where('fecha_creacion', '>=', $fechaInicio)->get();

        $pdf = PDF::loadView('equipo.averias_pdf', compact('equipo', 'averias'));

        $nombreArchivo = 'averias_equipo_' . $equipo->id . '_' . now()->format('Ymd') . '.pdf';

        return $pdf->download($nombreArchivo);
    }



}
