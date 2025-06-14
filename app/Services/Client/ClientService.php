<?php
namespace App\Services\Client;

use App\Models\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ClientService implements ClientServiceInterface
{
    public function list(): LengthAwarePaginator
    {
        return Client::latest()->paginate(10);
    }

    public function create(array $data): Client
    {
        return Client::create($data);
    }

    public function update(Client $client, array $data): Client
    {
        $client->update($data);
        return $client;
    }

    public function delete(Client $client): void
    {
        $client->delete();
    }
}
