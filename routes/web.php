<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\MantenimientosController;

Route::get('/', [UsersController::class, 'index']);
Route::get('/login2', [UsersController::class, 'index2']);
Route::get('/login', [UsersController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UsersController::class, 'login']);
Route::get('/users', [UsersController::class, 'users'])->name('users');
Route::get('/user', [UsersController::class, 'create']);
Route::post('/user', [UsersController::class, 'store'])->name('users.store');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/users/add', [UsersController::class, 'store'])->name('users.store');
Route::put('/users/update', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/delete/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
Route::post('/passwordRecovery', [UsersController::class, 'passwordRecovery'])->name('passwordRecovery');
Route::get('/password_Recovery', [UsersController::class, 'password_Recovery'])->name('password_Recovery');
Route::get('/companies', [CompaniesController::class, 'getCompanies'])->name('companies');
Route::post('/companies', [CompaniesController::class, 'store'])->name('companies.store');
Route::post('/companies/update', [CompaniesController::class, 'update'])->name('companies.update');
Route::get('/companies/{id}', [CompaniesController::class, 'edit'])->name('companies.edit');
Route::delete('/companies/delete/{id}', [CompaniesController::class, 'destroy'])->name('companies.destroy');
Route::post('/companies/select/{id}', [CompaniesController::class, 'selectEmpresa'])->name('companies.selectEmpresa');
Route::get('/equipments', [EquipmentsController::class, 'getEquipments'])->name('equipments');
Route::post('/equipments', [EquipmentsController::class, 'store'])->name('equipments.store');
Route::put('/equipments/update', [EquipmentsController::class, 'update'])->name('equipments.update');
Route::delete('/equipments/delete/{id}', [EquipmentsController::class, 'destroy'])->name('equipments.destroy');
Route::get('/login-google', [LoginController::class, 'redirectToGoogle'])->name('login-google');
Route::get('/google-callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('/mantenimientos', [MantenimientosController::class, 'getmantenimientos'])->name('mantenimientos');
Route::post('/mantenimientos', [MantenimientosController::class, 'store'])->name('mantenimientos.store');
Route::put('/mantenimientos', [MantenimientosController::class, 'update'])->name('mantenimientos.update');
Route::get('/users/{id}', function ($id) {
    $user = User::find($id);
    return response()->json([
        'name' => $user->name,
        'email' => $user->email,
        'roles' => $user->roles->pluck('name')->toArray() // Supongamos que tienes una relación roles en el modelo User
    ]);
});
