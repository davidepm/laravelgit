<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ViviendaController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\CarritoController;
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
/*
Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('/empleado/create',[EmpleadoController::class,'create']);
*/


Route::resource('empleado',EmpleadoController::class);//->middleware('auth');

Route::resource('vivienda',ViviendaController::class);//->middleware('auth');

Route::resource('orden',OrdenController::class);//->middleware('auth');

Route::resource('carrito',CarritoController::class);//->middleware('auth');

//Auth::routes(['register' => false, 'reset' => false]);

Auth::routes();

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/',[EmpleadoController::class,'index'])->name('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
