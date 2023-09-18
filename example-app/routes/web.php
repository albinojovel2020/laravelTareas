<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
/*
Route::get('/', function () {
    return 'Como estas?';
});
*/


//eSTE METODO SERVIRA PARAs ENCAPSULAR LAS RUTAS DE Controllador sy vistass
//Route::resource('task',TaskController::class);


Route::get('/', [TaskController::class, 'index'])->name('task.index');
//Route::get('/tasks', [TaskController::class, 'create'])->name('task.index');
Route::post('task', [TaskController::class, 'store'])->name('task.store');

Route::delete('task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
Route::get('task/{id}', [TaskController::class, 'show'])->name('task.show');


Route::put('task/edit', [TaskController::class, 'update'])->name('task.update');