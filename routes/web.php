<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AveriaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\TecnicoController;


// Ruta principal / LANDING
Route::get('/', function () {
    return view('welcome');
});

// Mostrar el formulario de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Procesar el login
Route::post('/login', [LoginController::class, 'login']);

// Si es alumno, negar la entrada
Route::get('/acceso-denegado', function () {
    return view('acceso_denegado');
})->name('acceso.denegado');


// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas para gestionar usuarios, solo accesibles cuando un usuario está autenticado
Route::middleware(['auth'])->group(function () {

    // Crear nuevo usuario
    Route::get('/usuarios/crear', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios/crear', [UserController::class, 'store'])->name('usuarios.store');

});


Route::middleware(['auth'])->group(function () {

    // Panel de Administración
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.panel');

    // Rutas de Técnicos
    Route::get('/tecnicos', [TecnicoController::class, 'index'])->name('tecnicos.index');
    Route::get('/tecnicos/create', [TecnicoController::class, 'create'])->name('tecnicos.create');
    Route::post('/tecnicos', [TecnicoController::class, 'store'])->name('tecnicos.store');
    Route::get('/tecnicos/{id}/edit', [TecnicoController::class, 'edit'])->name('tecnicos.edit');
    Route::put('/tecnicos/{id}', [TecnicoController::class, 'update'])->name('tecnicos.update');
    Route::delete('/tecnicos/{id}', [TecnicoController::class, 'destroy'])->name('tecnicos.destroy');

    // Rutas de Averías
    Route::get('/averias', [AveriaController::class, 'index'])->name('averias.index');
    Route::get('/averias/create', [AveriaController::class, 'create'])->name('averias.create');
    Route::post('/averias', [AveriaController::class, 'store'])->name('averias.store');
    Route::get('/averias/{id}/edit', [AveriaController::class, 'edit'])->name('averias.edit');
    Route::put('/averias/{id}', [AveriaController::class, 'update'])->name('averias.update');
    Route::delete('/averias/{id}', [AveriaController::class, 'destroy'])->name('averias.destroy');

    // Rutas de Equipos
    Route::get('/equipo', [EquipoController::class, 'index'])->name('equipo.index');
    Route::get('/equipo/create', [EquipoController::class, 'create'])->name('equipo.create');
    Route::post('/equipo', [EquipoController::class, 'store'])->name('equipo.store');
    Route::get('/equipo/{id}', [EquipoController::class, 'show'])->name('equipo.show');
    Route::get('/equipo/{id}/edit', [EquipoController::class, 'edit'])->name('equipo.edit');
    Route::put('/equipo/{id}', [EquipoController::class, 'update'])->name('equipo.update');
    Route::delete('/equipo/{id}', [EquipoController::class, 'destroy'])->name('equipo.destroy');


    // Rutas de Préstamos
    Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
    Route::get('/prestamos/create', [PrestamoController::class, 'create'])->name('prestamos.create');
    Route::post('/prestamos', [PrestamoController::class, 'store'])->name('prestamos.store');
    Route::get('/prestamos/{id}/edit', [PrestamoController::class, 'edit'])->name('prestamos.edit');
    Route::put('/prestamos/{id}', [PrestamoController::class, 'update'])->name('prestamos.update');
    Route::delete('/prestamos/{id}', [PrestamoController::class, 'destroy'])->name('prestamos.destroy');

    // Rutas de Usuarios (solo administradores pueden acceder a la creación y edición de usuarios)
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');

});
