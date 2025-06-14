<?php

namespace App\Services\Appointment;

interface AppointmentServiceInterface
{
    public function createAppointment(array $data): array;

    public function getAppointment(int $id): array;

    public function updateAppointment(int $id, array $data): array;

    public function deleteAppointment(int $id): array;

    public function listAppointments(array $filters): array;

    //Cancel
    public function cancel(Appointment $appointment): void;


}
