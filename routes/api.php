<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\API\RegisterController;

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

Route::post('/register', [RegisterController::class , 'register']);
Route::post('/login', [RegisterController::class , 'login']);
Route::post('/logout', [RegisterController::class , 'logout']);


Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('packages', PackageController::class);
    Route::apiResource('clients', ClientController::class);
});

