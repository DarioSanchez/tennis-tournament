<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/players', [PlayerController::class, 'index']);

Route::get('/players/{id}', [PlayerController::class, 'show']);

Route::post('/players', [PlayerController::class, 'store']);

Route::put('/players/{id}', [PlayerController::class, 'update']);

Route::delete('/players/{id}', [PlayerController::class, 'destroy']);
