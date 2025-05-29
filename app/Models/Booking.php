<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'property_id',
        'start_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function property()
    {
        return $this->belongsTo(\App\Models\Property::class);
    }
}
