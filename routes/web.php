<?php

use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\ProbarRoleController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/roluser', [ProbarRoleController::class, 'index']);

Route::resource('user', UserController::class)->middleware('auth');
Route::resource('noticia', NoticiasController::class)->middleware('auth');
Route::get("deportes",[NoticiasController::class, "deportes"])->name("deportes");
Route::get("actualidad",[NoticiasController::class, "actualidad"])->name("actualidad");
Route::get("ciencia",[NoticiasController::class, "ciencia"])->name("ciencia");
Route::get("gestion",[UserController::class, "gestion"])->name("gestion");

require __DIR__.'/auth.php';
