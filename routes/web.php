<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\MantenimientosController;




// Route::get('/', function () {
//     $response = Http::post('http://localhost:8000/api/login?email=ana.madrid@unison.mx&password=12345678');
//     $data = $response->json();
//     dd($data);
// });
Route::get('/', [UsersController::class, 'index']);
Route::get('/login2', [UsersController::class, 'index2']);
Route::get('/login', [UsersController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UsersController::class, 'login']);
Route::get('/usuarios', [UsersController::class, 'usuarios'])->name('usuarios');
Route::get('/usuario', [UsersController::class, 'create']);
Route::post('/usuario', [UsersController::class, 'store'])->name('usuarios.store');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/usuarios', [UsersController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/edit/{id}', [UsersController::class, 'edit'])->name('usuarios.edit');
Route::delete('/usuarios/delete/{id}', [UsersController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
Route::post('/passwordRecovery', [UsersController::class, 'passwordRecovery'])->name('passwordRecovery');
Route::get('/password_Recovery', [UsersController::class, 'password_Recovery'])->name('password_Recovery');
Route::get('/empresas', [EmpresasController::class, 'getEmpresas'])->name('empresas');
Route::post('/empresas', [EmpresasController::class, 'store'])->name('empresas.store');
Route::post('/empresas/update', [EmpresasController::class, 'update'])->name('empresas.update');
Route::get('/empresas/{id}', [EmpresasController::class, 'edit'])->name('empresas.edit');
Route::delete('/empresas/delete/{id}', [EmpresasController::class, 'destroy'])->name('empresas.destroy');
Route::post('/empresas/select/{id}', [EmpresasController::class, 'selectEmpresa'])->name('empresas.selectEmpresa');
Route::get('/equipos', [EquiposController::class, 'getEquipos'])->name('equipos');
Route::post('/equipos', [EquiposController::class, 'store'])->name('equipos.store');
Route::post('/equipos', [EquiposController::class, 'update'])->name('equipos.update');
Route::get('/login-google', [LoginController::class, 'redirectToGoogle'])->name('login-google');
Route::get('/google-callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('/mantenimientos', [MantenimientosController::class, 'getmantenimientos'])->name('mantenimientos');
Route::post('/mantenimientos', [MantenimientosController::class, 'store'])->name('mantenimientos.store');
Route::put('/mantenimientos', [MantenimientosController::class, 'update'])->name('mantenimientos.update');
