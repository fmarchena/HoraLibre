<?php
namespace App\Services\Professional;

use App\Models\Professional;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProfessionalServiceInterface
{
    public function list(): LengthAwarePaginator;
    public function create(array $data): Professional;
    public function update(Professional $professional, array $data): Professional;
    public function delete(Professional $professional): void;
}