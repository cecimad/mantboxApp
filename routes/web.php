<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;

 


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
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/usuarios/edit/{id}', [UsersController::class, 'edit'])->name('usuarios.edit');
Route::delete('/usuarios/delete/{id}', [UsersController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

