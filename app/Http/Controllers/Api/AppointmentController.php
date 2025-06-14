<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Services\Appointment\AppointmentServiceInterface;
use Illuminate\Http\JsonResponse;

class AppointmentController extends Controller
{
    public function index(): JsonResponse
    {
        $appointments = Appointment::with(['client', 'professional', 'service'])
            ->latest()
            ->paginate(10);

        return response()->json([
            'data' => AppointmentResource::collection($appointments),
            'meta' => [
                'total' => $appointments->total(),
                'per_page' => $appointments->perPage(),
                'current_page' => $appointments->currentPage(),
            ],
        ]);
    }

    public function store(
        StoreAppointmentRequest $request,
        AppointmentServiceInterface $appointmentService
    ): AppointmentResource {
        $appointment = $appointmentService->create($request->validated());

        return new AppointmentResource($appointment->load(['client', 'professional', 'service']));
    }

    public function show(Appointment $appointment): AppointmentResource
    {
        return new AppointmentResource($appointment->load(['client', 'professional', 'service']));
    }

    public function cancel(Appointment $appointment, AppointmentServiceInterface $appointmentService): JsonResponse
    {
        $appointmentService->cancel($appointment);

        return response()->json([
            'message' => 'La cita ha sido cancelada.',
        ]);
    }
}
