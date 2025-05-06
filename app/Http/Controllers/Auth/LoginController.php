<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ----------------------------- Formulario de login ----------------------------- //

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ----------------------------- Procesar login ----------------------------- //

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Bloquear acceso a alumnos
            if (Auth::user()->cargo === 'Alumno') {
                Auth::logout();
                return redirect()->route('acceso.denegado');
            }

            return redirect()->intended('/')->with('success', 'Inicio de sesión exitoso.');
        }

        return back()->with('error', 'Email o contraseña incorrectos.');
    }


    
    // ----------------------------- Logout ----------------------------- //

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('logout', 'Sesión cerrada correctamente.');
    }
}
