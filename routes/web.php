<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\OpisController;
use App\Http\Controllers\MonthController;
use App\Http\Controllers\Auth\RegisterController;

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
})->middleware('auth');

//Route::get('/hello', [HelloWorldController::class, 'show']);

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function() {

    Route::middleware(['can:isBoss'])->group(function() {

      Route::get('/users/delete/{id}', [UserController::class, 'destroy']);
    });

Route::get('/users/edit/{id}', [UserController::class, 'editview']);

Route::post('/users/edit/{id}', [UserController::class, 'update']);

Route::get('users/rcpopis', [OpisController::class, 'create']);

Route::post('/users/opis', [OpisController::class, 'store']);

Route::post('users', [TimeController::class, 'store']);

Route::get('users/rcp', [TimeController::class, 'create']);

Route::get('users/month', [MonthController::class, 'create']);

Route::post('/users/montho', [MonthController::class, 'store']);

Route::get('/users/list',  [UserController::class, 'index']);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
