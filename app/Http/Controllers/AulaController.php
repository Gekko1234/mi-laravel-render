<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index()
    {
        $aulas = Aula::all();
        return view('aulas.index', compact('aulas'));
    }

    public function create()
    {
        return view('aulas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'planta' => 'required|integer|min:0',
            'pos_x' => 'required|integer',
            'pos_y' => 'required|integer',
        ]);

        Aula::create($request->all());

        return redirect()->route('aulas.index')->with('success', 'Aula creada correctamente');
    }

    public function show(Aula $aula)
    {
        $aula->load('equipos'); // cargar equipos
        return view('aulas.show', compact('aula'));
    }

    public function edit(Aula $aula)
    {
        return view('aulas.edit', compact('aula'));
    }

    public function update(Request $request, Aula $aula)
    {
        $request->validate([
            'nombre' => 'required|string',
            'planta' => 'required|integer|min:0',
            'pos_x' => 'required|integer',
            'pos_y' => 'required|integer',
        ]);

        $aula->update($request->all());

        return redirect()->route('aulas.index')->with('success', 'Aula actualizada correctamente');
    }

    public function destroy(Aula $aula)
    {
        $aula->delete();
        return redirect()->route('aulas.index')->with('success', 'Aula eliminada correctamente');
    }

    public function mapa()
    {
        $aulas = Aula::with('equipos')->get();
        $plantas = [0, 1, 2];
        return view('aulas.mapa', compact('aulas', 'plantas'));
    }

}
