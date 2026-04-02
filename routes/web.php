<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BasicController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Using basic controller
Route::get('/basic', [BasicController::class, 'index'])->name('basic.index');
Route::get('/basic/create', [BasicController::class, 'create'])->name('basic.create');
Route::post('/basic/store', [BasicController::class, 'store'])->name('basic.store');
Route::get('/basic/edit/{id}', [BasicController::class, 'edit'])->name('basic.edit');
Route::post('/basic/update/{id}', [BasicController::class, 'update'])->name('basic.update');
Route::get('/basic/delete/{id}', [BasicController::class, 'destroy'])->name('basic.destroy');

Route::resource('posts', PostController::class);
Route::resource('posts-ajax', AjaxController::class);
