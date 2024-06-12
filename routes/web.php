<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpresasController;

 


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
Route::get('/usuario',[UsersController::class, 'create']);
Route::post('/usuario',[UsersController::class, 'store'])->name('usuarios.store');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/usuarios', [UsersController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/edit/{id}', [UsersController::class, 'edit'])->name('usuarios.edit');
Route::delete('/usuarios/delete/{id}', [UsersController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
Route::get('/empresas', [EmpresasController::class, 'getEmpresas'])->name('empresas');
Route::get('/empresas/edit/{id}', [UsersController::class, 'edit'])->name('empresas.edit');
Route::delete('/empresas/delete/{id}', [UsersController::class, 'destroy'])->name('empresas.destroy');

