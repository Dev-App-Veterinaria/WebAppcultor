<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\FloresController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Rota para a tela inicial
Route::view('/', 'principal/index')->name('index');

//Rotas de flores
Route::get('/flores', [FloresController::class, 'index'])->name('flores.index');

Route::get('/flores/create', [FloresController::class, 'create'])->name('flores.create');
Route::post('/flores/create', [FloresController::class, 'store'])->name('flores.store');

Route::get('/flores/{id}/edit', [FloresController::class, 'edit'])->name('flores.edit');
Route::put('/flores/{id}/edit', [FloresController::class, 'update'])->name('flores.update');

Route::get('/flores/{id}', [FloresController::class, 'destroy'])->name('flores.destroy');