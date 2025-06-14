<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Services\Client\ClientServiceInterface;
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Http\Resources\Client\ClientResource;

class ClientController extends Controller
{
    public function index(ClientServiceInterface $service)
    {
        return ClientResource::collection($service->list());
    }

    public function store(StoreClientRequest $request, ClientServiceInterface $service)
    {
        $client = $service->create($request->validated());
        return new ClientResource($client);
    }

    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    public function update(UpdateClientRequest $request, Client $client, ClientServiceInterface $service)
    {
        $client = $service->update($client, $request->validated());
        return new ClientResource($client);
    }

    public function destroy(Client $client, ClientServiceInterface $service)
    {
        $service->delete($client);
        return response()->json(['message' => 'Cliente eliminado.']);
    }
}
