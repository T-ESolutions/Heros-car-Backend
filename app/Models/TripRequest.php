<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'driver_id',
        'department_id',
        'driver_car_id',
        'trip_id',
        'trip_date',
        'trip_time',
        'price',
        'chairs',
        'wait_hours',
        'accept_at',
        'reject_at',
        'user_cancel_at',
        'user_cancel_reason',
        'user_rate',
        'user_rate_txt',
        'driver_rate',
        'driver_rate_txt',
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
    ];
}
