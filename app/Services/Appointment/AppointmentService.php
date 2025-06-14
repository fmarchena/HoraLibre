<?php
namespace App\Services\Appointment;

use App\Models\Appointment;
use App\Models\AvailabilitySlot;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AppointmentService implements AppointmentServiceInterface
{
    public function create(array $data): Appointment
    {
        $this->ensureSlotIsAvailable($data['professional_id'], $data['scheduled_at'], $data['service_id']);

        return DB::transaction(function () use ($data) {
            return Appointment::create([
                'client_id' => $data['client_id'],
                'professional_id' => $data['professional_id'],
                'service_id' => $data['service_id'],
                'scheduled_at' => $data['scheduled_at'],
                'status' => 'pending',
            ]);
        });
    }

    public function cancel(Appointment $appointment): void
    {
        if ($appointment->status === 'cancelled') {
            return;
        }

        $appointment->update(['status' => 'cancelled']);
    }

    protected function ensureSlotIsAvailable(int $professionalId, string $datetime, int $serviceId): void
    {
        $carbonDate = \Carbon\Carbon::parse($datetime);
        $weekday = strtolower($carbonDate->englishDayOfWeek); // ej: 'monday'
        $start = $carbonDate->format('H:i:s');

        $slot = AvailabilitySlot::where('professional_id', $professionalId)
            ->where('weekday', $weekday)
            ->where('start_time', '<=', $start)
            ->where('end_time', '>=', $start)
            ->first();

        if (!$slot) {
            throw ValidationException::withMessages([
                'scheduled_at' => 'El horario seleccionado no está disponible.',
            ]);
        }

        $overlap = Appointment::where('professional_id', $professionalId)
            ->where('scheduled_at', $datetime)
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        if ($overlap) {
            throw ValidationException::withMessages([
                'scheduled_at' => 'Ya hay una cita en este horario.',
            ]);
        }
    }
}
