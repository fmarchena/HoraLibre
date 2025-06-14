<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Appointment extends Model
{
    protected $fillable = [
        'client_id',
        'professional_id',
        'date',
        'time',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
