<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverCarDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'department_parent_id',
        'department_id',
        'driver_car_id',
    ];
}
