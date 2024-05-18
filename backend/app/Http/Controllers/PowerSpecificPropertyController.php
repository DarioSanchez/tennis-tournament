<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Src\Presentation\Controllers\PowerSpecificPropertyPresentationController;

class PowerSpecificPropertyController extends Controller
{
    private PowerSpecificPropertyPresentationController $presentationController;

    public function __construct(PowerSpecificPropertyPresentationController $presentationController)
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
}
