<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FormationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group( function () {

    Route::apiResource('informations', 'App\Http\Controllers\InformationController')
->only(['index', 'store', 'edit', 'update', 'destroy']);

Route::apiResource('formations', FormationController::class);
Route::apiResource('experiences', ExperienceController::class);

});



// authentication routes
Route::post('login', [LoginController::class,'login']);
Route::post('register', [RegisterController::class , 'register']);