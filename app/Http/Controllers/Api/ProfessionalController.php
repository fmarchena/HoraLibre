<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfessionalRequest;
use App\Http\Requests\UpdateProfessionalRequest;
use App\Http\Resources\ProfessionalResource;
use App\Models\Professional;
use App\Services\Professional\ProfessionalServiceInterface;

class ProfessionalController extends Controller
{
    public function index(ProfessionalServiceInterface $service)
    {
        return ProfessionalResource::collection($service->list());
    }

    public function store(StoreProfessionalRequest $request, ProfessionalServiceInterface $service)
    {
        $professional = $service->create($request->validated());
        return new ProfessionalResource($professional);
    }

    public function show(Professional $professional)
    {
        return new ProfessionalResource($professional->load('specialty'));
    }

    public function update(UpdateProfessionalRequest $request, Professional $professional, ProfessionalServiceInterface $service)
    {
        $professional = $service->update($professional, $request->validated());
        return new ProfessionalResource($professional);
    }

    public function destroy(Professional $professional, ProfessionalServiceInterface $service)
    {
        $service->delete($professional);
        return response()->json(['message' => 'Profesional eliminado.']);
    }
}
