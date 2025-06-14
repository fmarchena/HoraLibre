<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Services\Service\ServiceServiceInterface;

class ServiceController extends Controller
{
    public function index(ServiceServiceInterface $service)
    {
        return ServiceResource::collection($service->list());
    }

    public function byProfessional(int $professionalId, ServiceServiceInterface $service)
    {
        return ServiceResource::collection($service->byProfessional($professionalId));
    }

    public function store(StoreServiceRequest $request, ServiceServiceInterface $service)
    {
        $model = $service->create($request->validated());
        return new ServiceResource($model);
    }

    public function show(Service $service)
    {
        return new ServiceResource($service->load('professional'));
    }

    public function update(UpdateServiceRequest $request, Service $service, ServiceServiceInterface $serviceLayer)
    {
        $updated = $serviceLayer->update($service, $request->validated());
        return new ServiceResource($updated);
    }

    public function destroy(Service $service, ServiceServiceInterface $serviceLayer)
    {
        $serviceLayer->delete($service);
        return response()->json(['message' => 'Servicio eliminado.']);
    }
}
