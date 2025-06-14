<?php
namespace App\Services\Client;

use App\Models\Client;

interface ClientServiceInterface
{
    public function list(): \Illuminate\Contracts\Pagination\LengthAwarePaginator;
    public function create(array $data): Client;
    public function update(Client $client, array $data): Client;
    public function delete(Client $client): void;
}
