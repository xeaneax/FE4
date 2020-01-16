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

Route::any('exercise-1', 'Exercise1');
Route::any('exercise-2', 'Exercise2');
Route::any('exercise-3', 'Exercise3@index');
Route::any('exercise-3/store', 'Exercise3@store');
Route::any('exercise-final', 'ExerciseFinal@login');
Route::any('exercise-final/store', 'ExerciseFinal@store');
