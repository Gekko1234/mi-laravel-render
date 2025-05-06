<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ----------------------------- Formulario de creación de persona ----------------------------- //

    public function create()
    {
        if (!Auth::check() || !Auth::user()->es_admin) {
            return abort(403, 'Acceso no autorizado.');
        }

        return view('usuarios.create');
    }

    // ----------------------------- Almacenar nueva persona ----------------------------- //

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'not_in:Admin'],
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telefono' => 'required|string|max:15',
            'cargo' => 'required|string|max:255',
            'departamento' => 'nullable|string|max:255',
            'password' => 'required|string|min:5|confirmed',
            'es_admin' => 'nullable|boolean',
        ],[
            'name.required' => 'El nombre es obligatorio.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'cargo.required' => 'El cargo es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 5 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'cargo' => $request->cargo,
            'departamento' => $request->departamento,
            'password' => Hash::make($request->password),
            'es_admin' => $request->has('es_admin') ? true : false,
        ]);

        return redirect()->route('usuarios.create')->with('success', 'Persona creada correctamente.');
    }

    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'cargo' => 'required|string',
            'departamento' => 'nullable|string|max:255',
        ]);

        $usuario->update([
            'name' => $validated['name'],
            'apellidos' => $validated['apellidos'],
            'email' => $validated['email'],
            'telefono' => $validated['telefono'],
            'cargo' => $validated['cargo'],
            'departamento' => $validated['departamento'],
            'es_admin' => $request->has('es_admin'),
        ]);

        return redirect()->route('usuarios.show', $usuario->id)->with('success', 'Usuario actualizado correctamente.');
    }



}
