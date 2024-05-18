<?php

namespace Src\Presentation\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Application\Services\TournamentService;

class TournamentPresentationController
{
    private TournamentService $tournamentService;

    public function __construct(TournamentService $tournamentService)
    {
        $this->tournamentService = $tournamentService;
    }

    public function index(): JsonResponse
    {
        $tournaments = $this->tournamentService->getAllTournaments();
        return response()->json($tournaments);
    }

    public function show($id): JsonResponse
    {
        $tournament = $this->tournamentService->getTournamentById($id);
        return response()->json($tournament);
    }

    public function store($request): JsonResponse
    {
        $tournament = $this->tournamentService->createTournament($request->all());
        return response()->json($tournament, 201);
    }

    public function update($request, $id): JsonResponse
    {
        $tournament = $this->tournamentService->updateTournament($id, $request->all());
        return response()->json($tournament);
    }

    public function destroy($id): JsonResponse
    {
        $this->tournamentService->deleteTournament($id);
        return response()->json(null, 204);
    }

    public function startTournament($tournamentId)
    {
        $this->tournamentService->startTournament($tournamentId);
        return response()->json(['message' => 'Tournament started successfully'], 200);
    }

    public function getWinner($tournamentId)
    {
        $winner = $this->tournamentService->getTournamentWinner($tournamentId);
        return response()->json($winner);
    }

    public function getHistoricalResults($filters)
    {
        $results = $this->tournamentService->getHistoricalResults($filters);
        return response()->json($results);
    }


}
