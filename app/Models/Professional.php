<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
   
    protected $fillable = [
        'name',
        'email',
        'phone',
        'specialization',
        'experience_years',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    
    //AvailabilitySlot
    public function availabilitySlots()
    {
        return $this->hasMany(AvailabilitySlot::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
   
}
