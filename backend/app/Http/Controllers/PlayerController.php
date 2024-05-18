<?php
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Presentation\Controllers\PlayerPresentationController;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    private PlayerPresentationController $presentationController;

    public function __construct(PlayerPresentationController $presentationController)
    {
        $this->presentationController = $presentationController;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->presentationController->index();
    }

    public function show(Request $request, $id): JsonResponse
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

    public function destroy(Request $request, $id): JsonResponse
    {
        return $this->presentationController->destroy($id);
    }
}
