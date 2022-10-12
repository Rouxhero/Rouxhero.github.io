<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HPControllers;

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

Route::get('/',[HPControllers::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/addM', function () {
    return view('addM');
})->middleware(['auth'])->name('addM');

Route::get('/dashboard/user', function () {
    return view('addM');
})->middleware(['auth'])->name('user');

Route::get('/dashboard/server', function () {
    return view('addM');
})->middleware(['auth'])->name('server');

require __DIR__.'/auth.php';
