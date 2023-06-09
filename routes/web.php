<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/',function(){
    return view('admin_welcome');
})->name('/')->middleware('auth');

Route::get('/analista',function(){
    return view('analista_welcome');
})->name('analista')->middleware('auth');

Route::get('/trabajador',function(){
    return view('trabajador_welcome');
})->name('trabajador')->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
