<?php
namespace App\Services\Service;

use App\Models\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ServiceService implements ServiceServiceInterface
{
    public function list(): LengthAwarePaginator
    {
        return Service::with('professional')->latest()->paginate(10);
    }

    public function byProfessional(int $professionalId): \Illuminate\Support\Collection
    {
        return Service::where('professional_id', $professionalId)->get();
    }

    public function create(array $data): Service
    {
        return Service::create($data);
    }

    public function update(Service $service, array $data): Service
    {
        $service->update($data);
        return $service;
    }

    public function delete(Service $service): void
    {
        $service->delete();
    }
}
