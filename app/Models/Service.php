<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
    ];

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }
 
}
