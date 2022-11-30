<?php

use App\Http\Controllers\TareaController;
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
    return view('welcome');
});

// Route::get('/tarea',[TareaController::class, 'index']);
// // Esto nos permite mandar datos
// // post
// Route::post('/tarea',[TareaController::class, 'store']);

// IMPORTANTE ESTE COMANDO TE GENERA LAS RUTAS AUTOMATICAMENTE
Route::resource('tareas',TareaController::class);

// Route::post('/tarea',[TareaController::class, 'show']);
// Route::post('/tarea',[TareaController::class, 'update']);
// Route::post('/tarea',[TareaController::class, 'destroy']);
// Route::post('/tarea',[TareaController::class, 'edit']);