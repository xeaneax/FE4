<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::any('jako', 'Exercise1');
Route::any('jako-2', 'Exercise2');
Route::any('jako-3', 'Exercise3@index');
Route::any('jako-3/store', 'Exercise3@store');
Route::any('jako-final', 'ExerciseFinal@login');
Route::any('jako-final/store', 'ExerciseFinal@store');
