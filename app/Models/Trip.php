<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_number',
        'driver_id',
        'department_id',
        'driver_car_id',
        'trip_date',
        'trip_time_from',
        'trip_time_to',
        'chairs',
        'air',
        'bags',
        'from_lat',
        'from_lng',
        'from_address_ar',
        'from_address_en',
        'to_lat',
        'to_lng',
        'to_address_ar',
        'to_address_en',
        'end_lat',
        'end_lng',
        'end_address_ar',
        'end_address_en',
        'started_at',
        'finished_at',
        'cancelled_at',
        'cancel_reason',
    ];
}
