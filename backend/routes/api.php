<?php

use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlayerPowerPropertyController;
use App\Http\Controllers\PowerSpecificPropertyController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TournamentPlayerController;
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

// Player Routes
Route::get('/players', [PlayerController::class, 'index']);
Route::get('/players/{id}', [PlayerController::class, 'show']);
Route::post('/players', [PlayerController::class, 'store']);
Route::put('/players/{id}', [PlayerController::class, 'update']);
Route::delete('/players/{id}', [PlayerController::class, 'destroy']);

// Tournament Routes
Route::get('/tournaments', [TournamentController::class, 'index']);
Route::get('/tournaments/{id}', [TournamentController::class, 'show']);
Route::post('/tournaments', [TournamentController::class, 'store']);
Route::put('/tournaments/{id}', [TournamentController::class, 'update']);
Route::delete('/tournaments/{id}', [TournamentController::class, 'destroy']);
Route::post('/tournaments/{id}/start', [TournamentController::class, 'startTournament']);
Route::get('/tournaments/{id}/winner', [TournamentController::class, 'getWinner']);
Route::get('/tournaments/history', [TournamentController::class, 'getHistoricalResults']);
Route::post('/tournaments/{tournamentId}/register-player', [TournamentPlayerController::class, 'registerPlayer']);
Route::delete('/tournaments/{tournamentId}/unregister-player', [TournamentPlayerController::class, 'unregisterPlayer']);
Route::get('/tournaments/{tournamentId}/players', [TournamentPlayerController::class, 'listPlayers']);
Route::post('/tournaments/{tournamentId}/simulate', [MatchController::class, 'simulateTournamentMatches']);


// Power Specific Property Routes
Route::get('/power-properties', [PowerSpecificPropertyController::class, 'index']);
Route::get('/power-properties/{id}', [PowerSpecificPropertyController::class, 'show']);
Route::post('/power-properties', [PowerSpecificPropertyController::class, 'store']);
Route::put('/power-properties/{id}', [PowerSpecificPropertyController::class, 'update']);
Route::delete('/power-properties/{id}', [PowerSpecificPropertyController::class, 'destroy']);

// Player Power Property Routes
Route::get('/player-power-properties', [PlayerPowerPropertyController::class, 'index']);
Route::get('/player-power-properties/{id}', [PlayerPowerPropertyController::class, 'show']);
Route::post('/player-power-properties', [PlayerPowerPropertyController::class, 'store']);
Route::put('/player-power-properties/{id}', [PlayerPowerPropertyController::class, 'update']);
Route::delete('/player-power-properties/{id}', [PlayerPowerPropertyController::class, 'destroy']);

// Match Routes
Route::get('/matches', [MatchController::class, 'index']);
Route::get('/matches/{id}', [MatchController::class, 'show']);
Route::post('/matches', [MatchController::class, 'store']);
Route::put('/matches/{id}', [MatchController::class, 'update']);
Route::delete('/matches/{id}', [MatchController::class, 'destroy']);





