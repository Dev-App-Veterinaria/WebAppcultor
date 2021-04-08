<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FloresController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ArtigosController;
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
//Rotas de login
Route::view('/login', 'login/index')->name('login');
//Rota para a tela inicial
Route::view('/', 'principal/index')->name('index');

//Rotas de flores
Route::get('/flores', [FloresController::class, 'index'])->name('flores.index');

Route::get('/flores/create', [FloresController::class, 'create'])->name('flores.create');
Route::post('/flores/create', [FloresController::class, 'store'])->name('flores.store');

Route::get('/flores/{id}/edit', [FloresController::class, 'edit'])->name('flores.edit');
Route::put('/flores/{id}/edit', [FloresController::class, 'update'])->name('flores.update');

Route::get('/flores/{id}', [FloresController::class, 'destroy'])->name('flores.destroy');

//Rotas de tags
Route::get('/tags', [TagsController::class, 'index'])->name('tags.index');

Route::get('/tags/create', [TagsController::class, 'create'])->name('tags.create');
Route::post('/tags/create', [TagsController::class, 'store'])->name('tags.store');

Route::get('/tags/{id}/edit', [TagsController::class, 'edit'])->name('tags.edit');
Route::put('/tags/{id}/edit', [TagsController::class, 'update'])->name('tags.update');

Route::get('/tags/{id}', [TagsController::class, 'destroy'])->name('tags.destroy');

//Rotas de artigos
Route::get('/artigos', [ArtigosController::class, 'index'])->name('artigos.index');

Route::get('/artigos/create', [ArtigosController::class, 'create'])->name('artigos.create');
Route::post('/artigos/create', [ArtigosController::class, 'store'])->name('artigos.store');

Route::get('/artigos/{id}/edit', [ArtigosController::class, 'edit'])->name('artigos.edit');
Route::put('/artigos/{id}/edit', [ArtigosController::class, 'update'])->name('artigos.update');

Route::get('/artigos/{id}', [ArtigosController::class, 'destroy'])->name('artigos.destroy');


