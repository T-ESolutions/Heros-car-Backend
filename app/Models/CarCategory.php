<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'title',
        'start_price',
        'min_price',
        'km_price',
        'wait_price',
    ];

}
