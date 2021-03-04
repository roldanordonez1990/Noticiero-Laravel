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
    return view('noticia.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/roluser', [ProbarRoleController::class, 'index']);

Route::middleware('auth', 'verified')->group(function(){
    Route::resource('user', UserController::class);
    Route::resource('noticia', NoticiasController::class);
    Route::get("deportes",[NoticiasController::class, "deportes"])->name("deportes");
    Route::get("actualidad",[NoticiasController::class, "actualidad"])->name("actualidad");
    Route::get("ciencia",[NoticiasController::class, "ciencia"])->name("ciencia");
    Route::get("noticia/create",[NoticiasController::class, "create"])->name('create')->middleware('admincontrol');
    Route::get("gestion",[UserController::class, "gestion"])->name("gestion")->middleware('admincontrol');
});


require __DIR__.'/auth.php';
