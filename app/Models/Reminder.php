<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
        'appointment_id',
        'reminder_time',
        'message',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
    
 
}
