<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\User;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class PrestamoController extends Controller
{
    // Mostrar la lista de préstamos
    public function index()
    {
        // Obtener todos los préstamos
        $prestamos = Prestamo::with('user', 'equipo')->get();
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
        $validated = $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'user_id' => 'required|exists:users,id',
            'observaciones' => 'nullable|string',
        ]);

        // Guardar la fecha actual como fecha de préstamo
        $validated['fecha_prestamo'] = Carbon::now();
        $validated['estado'] = 'Prestado';

        Prestamo::create($validated);

        $equipo = Equipo::find($request->equipo_id);
        if ($equipo) {
            $equipo->estado = 'En uso';
            $equipo->save();
        }

        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado correctamente.');
    }


    // Mostrar formulario de edición
    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $usuarios = User::all();
        $equipos = Equipo::all();

        return view('prestamos.edit', compact('prestamo', 'usuarios', 'equipos'));
    }

    // Guardar los cambios en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'equipo_id' => 'required|exists:equipos,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date',
            'observaciones' => 'nullable|string',
        ]);

        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update($request->all());

        // Actualizar estado del equipo según el estado del préstamo
        $equipo = Equipo::find($prestamo->equipo_id);
        if ($equipo) {
            if ($prestamo->estado === 'Prestado') {
                $equipo->estado = 'En uso';
            } elseif ($prestamo->estado === 'Sin prestar') {
                $equipo->estado = 'Disponible';  
            }
            $equipo->save();
        }

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado correctamente.');
    }

    public function finalizar(Prestamo $prestamo)
    {
        $prestamo->estado = 'Sin prestar';
        $prestamo->fecha_devolucion = Carbon::now();  // Fecha finalización
        $prestamo->save();

        if ($prestamo->equipo) {
            $prestamo->equipo->estado = 'Disponible';
            $prestamo->equipo->save();
        }

        return redirect()->back()->with('success', 'Préstamo finalizado y equipo actualizado.');
    }

    public function verPrestamos($userId)
    {
        $usuario = User::findOrFail($userId);

        $fechaInicio = Carbon::now()->subMonth();

        $prestamos = $usuario->prestamos()
            ->orderBy('fecha_prestamo', 'desc')
            ->get();


        return view('usuarios.prestamos', compact('usuario', 'prestamos'));
    }

    // Generar y descargar PDF con los préstamos del usuario
    public function descargarPrestamosPDF($userId)
    {
        $usuario = User::findOrFail($userId);

        $prestamos = $usuario->prestamos()
            ->orderBy('fecha_prestamo', 'desc')
            ->get();

        $pdf = PDF::loadView('usuarios.prestamos_pdf', compact('usuario', 'prestamos'));
        return $pdf->download('prestamos_'.$usuario->name.'_'.now()->format('Ymd').'.pdf');
    }



}
