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
Route::get('/', \App\Http\Controllers\Site\IndexController::class);

Route::get('/main', \App\Http\Controllers\Task\IndexController::class)->middleware('auth');


Route::group(['prefix' => 'tasks', 'middleware' => 'auth'], function(){
    Route::get('/', \App\Http\Controllers\Task\IndexController::class)->name('task.index');
    Route::get('/create', \App\Http\Controllers\Task\CreateController::class)->name('task.create');
    Route::post('/', \App\Http\Controllers\Task\StoreController::class)->name('task.store');
    Route::get('/{task}/edit', \App\Http\Controllers\Task\EditController::class)->name('task.edit');
    Route::patch('/{task}', \App\Http\Controllers\Task\UpdateController::class)->name('task.update');
    Route::delete('/{task}', \App\Http\Controllers\Task\DestroyController::class)->name('task.delete');

    Route::patch('/{task}/complete', [\App\Http\Controllers\Task\CompletedController::class, 'complete'])->name('task.complete');
    Route::get('/completed', [\App\Http\Controllers\Task\CompletedController::class, 'index'])->name('task.completed');
});

require __DIR__.'/auth.php';

