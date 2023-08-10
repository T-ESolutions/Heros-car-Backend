<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPrice extends Model
{
    use HasFactory;

    protected $fillable=[
        'department_id',
        'brand_id',
        'modell_id',
        'factory_year',
        'start_price',
        'min_price',
        'km_price',
        'wait_price',
    ];
}
