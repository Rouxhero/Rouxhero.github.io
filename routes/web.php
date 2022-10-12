<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HPControllers;
use App\Http\Controllers\AjaxController;

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



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/dashboard/addM', function () {
        return view('addM');
    })->name('addM');
    
    
    Route::get('/dashboard/machine', function () {
        return view('addM');
    })->name('machine');
    
    Route::get('/dashboard/user', function () {
        return view('addM');
    })->name('user');
    
    Route::get('/dashboard/server', function () {
        return view('server');
    })->name('server');
    // AJAX 
    Route::post('/ajax/gitpull', [AjaxController::class,'gitpull']);
    Route::post('/ajax/savedb', [AjaxController::class,'savedb']);
    Route::post('/ajax/freshdb', [AjaxController::class,'freshdb']);
    Route::post('/ajax/cache', [AjaxController::class,'cache']);
});
require __DIR__.'/auth.php';
