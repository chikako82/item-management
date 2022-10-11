<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('/items/{id}/edit');
    Route::post('/{id}/edit', [App\Http\Controllers\ItemController::class, 'update'])->name('/items/{id}/edit');
    Route::delete('/{id}/delete', [App\Http\Controllers\ItemController::class, 'destroy'])->name('/items/{id}/delete');
});

Route::prefix('types')->group(function () {
    Route::get('/', [App\Http\Controllers\TypeController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\TypeController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\TypeController::class, 'add']);
    Route::get('/{id}/edit', [App\Http\Controllers\TypeController::class, 'edit'])->name('/types/{id}/edit');
    Route::post('/{id}/edit', [App\Http\Controllers\TypeController::class, 'update'])->name('/types/{id}/edit');
    Route::delete('/{id}/delete', [App\Http\Controllers\TypeController::class, 'destroy'])->name('/types/{id}/delete');
});

Route::prefix('home')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'top']);
    Route::get('/{id}/index', [App\Http\Controllers\HomeController::class, 'index'])->name('/home/{id}/index');
    Route::get('/{id}/show', [App\Http\Controllers\HomeController::class, 'show'])->name('/home/{id}/show');
});
