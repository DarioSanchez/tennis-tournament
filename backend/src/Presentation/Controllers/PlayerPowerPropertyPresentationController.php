<?php

namespace Src\Presentation\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Application\Services\PlayerPowerPropertyService;

class PlayerPowerPropertyPresentationController
{
    private PlayerPowerPropertyService $service;

    public function __construct(PlayerPowerPropertyService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $properties = $this->service->getAllProperties();
        return response()->json($properties);
    }

    public function show($id): JsonResponse
    {
        $property = $this->service->getPropertyById($id);
        return response()->json($property);
    }

    public function store(Request $request): JsonResponse
    {
        $property = $this->service->createOrUpdateProperty($request->all());
        return response()->json($property, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $property = $this->service->createOrUpdateProperty(array_merge($request->all(), ['id' => $id]));
        return response()->json($property);
    }

    public function destroy($id): JsonResponse
    {
        $this->service->deleteProperty($id);
        return response()->json(null, 204);
    }
}
