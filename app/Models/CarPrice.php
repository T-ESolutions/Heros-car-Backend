<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPrice extends Model
{
    use HasFactory;

    protected $fillable=[
        'car_category_id',
        'department_id',
        'brand_id',
        'modell_id',
        'factory_year',
    ];
}
