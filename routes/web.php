<?php

use App\Http\Controllers\PersonasController;
use App\Http\Controllers\CarreraController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/persona', [PersonasController::class, 'index'])->name('personas.index');
Route::get('/persona/create', [PersonasController::class, 'create'])->name('personas.create');
Route::post('/persona', [PersonasController::class, 'store'])->name('personas.store');
Route::get('/persona/{personas}/edit', [PersonasController::class, 'edit'])->name('personas.edit');
Route::put('/persona/{personas}/update', [PersonasController::class, 'update'])->name('personas.update');
Route::delete('/persona/{personas}/destroy', [PersonasController::class, 'destroy'])->name('personas.destroy');


