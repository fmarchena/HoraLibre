<?php
namespace App\Services\Professional;

use App\Models\Professional;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProfessionalService implements ProfessionalServiceInterface
{
    public function list(): LengthAwarePaginator
    {
        return Professional::with('specialty')->latest()->paginate(10);
    }

    public function create(array $data): Professional
    {
        return Professional::create($data);
    }

    public function update(Professional $professional, array $data): Professional
    {
        $professional->update($data);
        return $professional;
    }

    public function delete(Professional $professional): void
    {
        $professional->delete();
    }
}
