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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\ComposeController::class, 'index'])->name('index');

Route::get('/create', [App\Http\Controllers\ComposeController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\ComposeController::class, 'store'])->name('store');
Route::get('/index', [App\Http\Controllers\ComposeController::class, 'index'])->name('index');
Route::get('/edit/{id}', [App\Http\Controllers\ComposeController::class, 'edit'])->name('edit');
Route::get('/show/{id}', [App\Http\Controllers\ComposeController::class, 'show'])->name('show');
Route::post('/update/{id}', [App\Http\Controllers\ComposeController::class, 'update'])->name('update');
Route::post('/delete/{id}', [App\Http\Controllers\ComposeController::class, 'delete'])->name('delete');

Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::post('/like/{composeId}',[LikeController::class,'store']);
Route::post('/unlike/{composeId}',[LikeController::class,'destroy']);