<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Obtén el usuario autenticado
        $user = Auth::user();

        // Verifica si el cargo es "Administrador" o "Profesor"
        if ($user->cargo !== "Administrador" && $user->cargo !== "Profesor") {
            // Si no es administrador ni profesor, redirige al inicio
            return redirect('/')->with('error', 'No tienes permisos para acceder al panel de administración.');
        }

        // Si es administrador o profesor, muestra el panel
        return view('admin.panel');
    }
}
