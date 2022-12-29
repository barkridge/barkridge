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

Route::get('/', \App\Http\Controllers\WelcomeController::class);

Route::get('/nova/login', [\App\Http\Controllers\Auth\LoginController::class, 'index']);
Route::post('/nova/login', [\App\Http\Controllers\Auth\LoginController::class, 'store']);
Route::get('/nova/logout', [\App\Http\Controllers\Auth\LoginController::class, 'destroy']);

Route::get('/{slug}', [\App\Http\Controllers\RedirectController::class, 'show']);
