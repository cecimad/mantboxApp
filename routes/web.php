<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\MantenimientosController;

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
Route::get('/companies', [CompaniesController::class, 'getCompanies'])->name('companies');
Route::post('/companies', [CompaniesController::class, 'store'])->name('companies.store');
Route::post('/companies/update', [CompaniesController::class, 'update'])->name('companies.update');
Route::get('/companies/{id}', [CompaniesController::class, 'edit'])->name('companies.edit');
Route::delete('/companies/delete/{id}', [CompaniesController::class, 'destroy'])->name('companies.destroy');
Route::post('/companies/select/{id}', [CompaniesController::class, 'selectEmpresa'])->name('companies.selectEmpresa');
Route::get('/equipos', [EquiposController::class, 'getEquipos'])->name('equipos');
Route::post('/equipos', [EquiposController::class, 'store'])->name('equipos.store');
Route::post('/equipos', [EquiposController::class, 'update'])->name('equipos.update');
Route::get('/login-google', [LoginController::class, 'redirectToGoogle'])->name('login-google');
Route::get('/google-callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('/mantenimientos', [MantenimientosController::class, 'getmantenimientos'])->name('mantenimientos');
Route::post('/mantenimientos', [MantenimientosController::class, 'store'])->name('mantenimientos.store');
Route::put('/mantenimientos', [MantenimientosController::class, 'update'])->name('mantenimientos.update');
