<?php

namespace Src\Presentation\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Application\Services\PlayerService;

class PlayerPresentationController
{
    private PlayerService $playerService;

    public function __construct(PlayerService $playerService)
    {
        $this->playerService = $playerService;
    }

    public function index(): JsonResponse
    {
        $players = $this->playerService->getAllPlayers();
        return response()->json($players);
    }

    public function show($id): JsonResponse
    {
        $player = $this->playerService->getPlayerById($id);
        return response()->json($player);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->all();
        $player = $this->playerService->createPlayer($data);
        return response()->json($player, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();
        $player = $this->playerService->updatePlayer($id, $data);
        return response()->json($player);
    }

    public function destroy($id): JsonResponse
    {
        $this->playerService->deletePlayer($id);
        return response()->json(null, 204);
    }
}
