<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Src\Presentation\Controllers\TournamentPresentationController;

class TournamentController extends Controller
{
    private TournamentPresentationController $presentationController;

    public function __construct(TournamentPresentationController $presentationController)
    {
        $this->presentationController = $presentationController;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->presentationController->index();
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return $this->presentationController->show($id);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return $this->presentationController->store($request);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        return $this->presentationController->update($request, $id);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return $this->presentationController->destroy($id);
    }

    /**
     * @param Request $request
     * @param $tournamentId
     * @return JsonResponse
     */
    public function startTournament(Request $request, $tournamentId): JsonResponse
    {
           return $this->presentationController->startTournament($tournamentId);
    }

    /**
     * @param $tournamentId
     * @return JsonResponse
     */
    public function getWinner($tournamentId): JsonResponse
    {
       return $this->presentationController->getWinner($tournamentId);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getHistoricalResults(Request $request): JsonResponse
    {
        $filters = $request->only(['date', 'type']);
        return $this->presentationController->getHistoricalResults($filters);
    }

}
