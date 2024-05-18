<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Src\Presentation\Controllers\MatchPresentationController;

class MatchController extends Controller
{
    private MatchPresentationController $presentationController;

    public function __construct(MatchPresentationController $presentationController)
    {
        $this->presentationController = $presentationController;
    }

    public function index(): JsonResponse
    {
        return $this->presentationController->index();
    }

    public function show($id): JsonResponse
    {
        return $this->presentationController->show($id);
    }

    public function store(Request $request): JsonResponse
    {
        return $this->presentationController->store($request);
    }

    public function update(Request $request, $id): JsonResponse
    {
        return $this->presentationController->update($request, $id);
    }

    public function destroy($id): JsonResponse
    {
        return $this->presentationController->destroy($id);
    }

    public function simulateTournamentMatches(Request $request, $tournamentId)
    {
        return $this->presentationController->simulateTournamentMatches((int) $tournamentId);
    }
}
