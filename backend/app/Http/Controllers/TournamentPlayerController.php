<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Presentation\Controllers\TournamentPlayerPresentationController;

class TournamentPlayerController extends Controller
{
    private $presentationController;

    public function __construct(TournamentPlayerPresentationController $presentationController)
    {
        $this->presentationController = $presentationController;
    }

    public function registerPlayer(Request $request, $tournamentId)
    {
        $playerId = $request->input('player_id');
        return $this->presentationController->registerPlayer($tournamentId, $playerId);
    }

    public function unregisterPlayer(Request $request, $tournamentId)
    {
        $playerId = $request->input('player_id');
        return $this->presentationController->unregisterPlayer($tournamentId, $playerId);
    }

    public function listPlayers($tournamentId)
    {
        return $this->presentationController->listPlayers($tournamentId);
    }
}
