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

Route::get('/',[HPControllers::class, 'index'])->name('map');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/dashboard/addM', function () {
        if (auth()->user()->right >=1 ) {
            return view('addM');
        } else {
            return redirect()->back();
        }
    })->name('addM');
    
    
    Route::get('/dashboard/machine', function () {
        if (auth()->user()->right >=2 ) {
            return view('machine');
        } else {
            return redirect()->back();
        }
    })->name('machine');
    
    Route::get('/dashboard/user', function () {
        if (auth()->user()->right >=3 ) {
            return view('user');
        } else {
            return redirect()->back();
        }
    })->name('user');
    
    Route::get('/dashboard/server', function () {
        if (auth()->user()->right >=3 ) {
            return view('server');
        } else {
            return redirect()->back();
        }
    })->name('server');
    // AJAX 
    Route::post('/ajax/gitpull', [AjaxController::class,'gitpull']);
    Route::post('/ajax/savedb', [AjaxController::class,'savedb']);
    Route::post('/ajax/freshdb', [AjaxController::class,'freshdb']);
    Route::post('/ajax/cache', [AjaxController::class,'cache']);
    Route::post('/ajax/edituser', [AjaxController::class,'edituser']); 
    Route::post('/ajax/saveUser', [AjaxController::class,'updateUser']);
    Route::post('/ajax/addm', [AjaxController::class,'addm']);
   
});

Route::post('/ajax/getMarker', [AjaxController::class,'getMarker']);
Route::post('/ajax/updateMachine', [AjaxController::class,'updateMachine']);
require __DIR__.'/auth.php';
