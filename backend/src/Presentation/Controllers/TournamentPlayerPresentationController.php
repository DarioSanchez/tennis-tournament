<?php

namespace Src\Presentation\Controllers;

use Src\Application\Services\TournamentPlayerService;
use Illuminate\Http\JsonResponse;

class TournamentPlayerPresentationController
{
    private $tournamentPlayerService;

    public function __construct(TournamentPlayerService $tournamentPlayerService)
    {
        $this->tournamentPlayerService = $tournamentPlayerService;
    }

    public function registerPlayer($tournamentId, $playerId): JsonResponse
    {
        $result = $this->tournamentPlayerService->registerPlayerToTournament($tournamentId, $playerId);
        return response()->json($result);
    }

    public function unregisterPlayer($tournamentId, $playerId): JsonResponse
    {
        $result = $this->tournamentPlayerService->unregisterPlayerFromTournament($tournamentId, $playerId);
        return response()->json($result);
    }

    public function listPlayers($tournamentId): JsonResponse
    {
        $players = $this->tournamentPlayerService->getTournamentPlayers($tournamentId);
        return response()->json($players);
    }
}
