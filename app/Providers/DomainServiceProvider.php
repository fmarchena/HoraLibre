<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Appointment\AppointmentService;
use App\Services\Appointment\AppointmentServiceInterface;

use App\Services\Client\ClientServiceInterface;
use App\Services\Client\ClientService;

use App\Services\Professional\ProfessionalServiceInterface;
use App\Services\Professional\ProfessionalService;

use App\Services\Service\ServiceServiceInterface;
use App\Services\Service\ServiceService;

class DomainServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AppointmentServiceInterface::class, AppointmentService::class);
        $this->app->bind(ClientServiceInterface::class, ClientService::class);
        $this->app->bind(ProfessionalServiceInterface::class, ProfessionalService::class);
        $this->app->bind(ServiceServiceInterface::class, ServiceService::class);
    }

    public function boot(): void
    {
        //
    }
}
