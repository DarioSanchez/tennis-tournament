<?php

namespace Src\Presentation\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Application\Services\MatchService;
use Src\Application\Services\TournamentService;

class MatchPresentationController
{
    private MatchService $matchService;
    private TournamentService $tournamentService;

    public function __construct(MatchService $matchService, TournamentService $tournamentService)
    {
        $this->matchService = $matchService;
        $this->tournamentService = $tournamentService;
    }

    public function index(): JsonResponse
    {
        $matches = $this->matchService->getAllMatches();
        return response()->json($matches);
    }

    public function show($id): JsonResponse
    {
        $match = $this->matchService->getMatchById($id);
        return response()->json($match);
    }

    public function store(Request $request): JsonResponse
    {
        $match = $this->matchService->createOrUpdateMatch($request->all());
        return response()->json($match, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $match = $this->matchService->createOrUpdateMatch(array_merge(['id' => $id], $request->all()));
        return response()->json($match);
    }

    public function destroy($id): JsonResponse
    {
        $this->matchService->deleteMatch($id);
        return response()->json(null, 204);
    }

    public function simulateTournamentMatches(int $tournamentId): JsonResponse
    {
        $tournament = $this->tournamentService->getTournamentById($tournamentId);
        if (!$tournament) {
            return response()->json(['error' => 'Tournament not found'], 404);
        }

        $matches = $this->matchService->simulateTournamentMatches($tournamentId, $tournament->gender);
        return response()->json($matches);
    }


}
