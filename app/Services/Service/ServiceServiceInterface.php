<?php
namespace App\Services\Service;

use App\Models\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ServiceServiceInterface
{
    public function list(): LengthAwarePaginator;
    public function byProfessional(int $professionalId): \Illuminate\Support\Collection;
    public function create(array $data): Service;
    public function update(Service $service, array $data): Service;
    public function delete(Service $service): void;
}
