<?php

use App\Http\Controllers\ArmadaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Customers
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}/update', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}/destroy', [CustomerController::class, 'destroy'])->name('customers.destroy');

    // Armadas
    Route::get('/armadas', [ArmadaController::class, 'index'])->name('armadas.index');
    Route::get('/armadas/create', [ArmadaController::class, 'create'])->name('armadas.create');
    Route::post('/armadas/create', [ArmadaController::class, 'store'])->name('armadas');
    Route::get('/armadas/{id}/edit', [ArmadaController::class, 'edit'])->name('armadas.edit');
    Route::put('/armadas/{id}/update', [ArmadaController::class, 'update'])->name('armadas.update');
    Route::delete('/armadas/{id}/destroy', [ArmadaController::class, 'destroy'])->name('armadas.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
