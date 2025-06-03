<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AveriaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\AulaController;


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
    Route::get('/tecnicos/{id}', [TecnicoController::class, 'show'])->name('tecnicos.show');
    Route::put('/tecnicos/{id}', [TecnicoController::class, 'update'])->name('tecnicos.update');
    Route::delete('/tecnicos/{id}', [TecnicoController::class, 'destroy'])->name('tecnicos.destroy');

    // Rutas de Averías
    Route::get('/averias', [AveriaController::class, 'index'])->name('averias.index');
    Route::get('/averias/create', [AveriaController::class, 'create'])->name('averias.create');
    Route::post('/averias', [AveriaController::class, 'store'])->name('averias.store');
    Route::get('/averias/{id}/edit', [AveriaController::class, 'edit'])->name('averias.edit');
    Route::put('/averias/{id}', [AveriaController::class, 'update'])->name('averias.update');
    Route::delete('/averias/{id}', [AveriaController::class, 'destroy'])->name('averias.destroy');
    Route::post('/averias/{id}/finalizar', [AveriaController::class, 'finalizar'])->name('averias.finalizar');
    Route::get('/equipos/{equipo}/averias/pdf', [EquipoController::class, 'descargarAveriasPdf'])->name('equipos.averias.pdf');


    // Rutas de Equipos
    Route::get('/equipo', [EquipoController::class, 'index'])->name('equipo.index');
    Route::get('/equipo/create', [EquipoController::class, 'create'])->name('equipo.create');
    Route::post('/equipo', [EquipoController::class, 'store'])->name('equipo.store');
    Route::get('equipo/{id}', [EquipoController::class, 'show'])->name('equipo.show');
    Route::get('/equipo/{id}/edit', [EquipoController::class, 'edit'])->name('equipo.edit');
    Route::put('/equipo/{id}', [EquipoController::class, 'update'])->name('equipo.update');
    Route::delete('/equipo/{id}', [EquipoController::class, 'destroy'])->name('equipo.destroy');
    Route::get('/equipos/{equipo}/averias', [EquipoController::class, 'verAverias'])->name('equipos.averias');
    


    // Rutas de Préstamos
    Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
    Route::get('/prestamos/create', [PrestamoController::class, 'create'])->name('prestamos.create');
    Route::post('/prestamos', [PrestamoController::class, 'store'])->name('prestamos.store');
    Route::get('/prestamos/{id}/edit', [PrestamoController::class, 'edit'])->name('prestamos.edit');
    Route::put('/prestamos/{id}', [PrestamoController::class, 'update'])->name('prestamos.update');
    Route::delete('/prestamos/{id}', [PrestamoController::class, 'destroy'])->name('prestamos.destroy');
    Route::post('/prestamos/{prestamo}/finalizar', [App\Http\Controllers\PrestamoController::class, 'finalizar'])->name('prestamos.finalizar');

    // Rutas de Usuarios (solo administradores pueden acceder a la creación y edición de usuarios)
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
    Route::get('/usuarios/{user}/prestamos', [PrestamoController::class, 'verPrestamos'])->name('usuarios.prestamos');     // Mostrar préstamos de un usuario específico
    Route::get('/usuarios/{user}/prestamos/pdf', [PrestamoController::class, 'descargarPrestamosPDF'])->name('usuarios.prestamos.pdf');     // Descargar PDF con los préstamos del usuario


    // Ruta de las aulas y mapa
    Route::get('/aulas/mapa', [AulaController::class, 'mapa'])->name('aulas.mapa');
    Route::get('/aulas', [AulaController::class, 'index'])->name('aulas.index');     // Mostrar todas las aulas
    Route::get('/aulas/create', [AulaController::class, 'create'])->name('aulas.create');     // Mostrar formulario para crear una nueva aula
    Route::post('/aulas', [AulaController::class, 'store'])->name('aulas.store');     // Guardar una nueva aula
    Route::get('/aulas/{aula}', [AulaController::class, 'show'])->name('aulas.show');     // Mostrar una aula específica
    Route::get('/aulas/{aula}/edit', [AulaController::class, 'edit'])->name('aulas.edit');     // Mostrar formulario para editar una aula
    Route::put('/aulas/{aula}', [AulaController::class, 'update'])->name('aulas.update');     // Actualizar una aula
    Route::delete('/aulas/{aula}', [AulaController::class, 'destroy'])->name('aulas.destroy');     // Eliminar una aula

});