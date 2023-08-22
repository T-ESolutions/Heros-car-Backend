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
        'car_category_id',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function car_category()
    {
        return $this->belongsTo(CarCategory::class, 'car_category_id');
    }

    public function driver_car()
    {
        return $this->belongsTo(DriverCar::class, 'driver_car_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function department_parent()
    {
        return $this->belongsTo(Department::class, 'department_parent_id');
    }

}
