<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'scheduled_at' => $this->scheduled_at->toIso8601String(),
            'status' => $this->status,
            'client' => [
                'id' => $this->client->id,
                'name' => $this->client->name,
                'email' => $this->client->email,
            ],
            'professional' => [
                'id' => $this->professional->id,
                'name' => $this->professional->name,
                'email' => $this->professional->email,
            ],
            'service' => [
                'id' => $this->service->id,
                'name' => $this->service->name,
                'price' => $this->service->price,
                'duration_minutes' => $this->service->duration_minutes,
            ],
        ];
    }
}
