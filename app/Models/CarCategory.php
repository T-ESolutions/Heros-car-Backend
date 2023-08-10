<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_price',
        'min_price',
        'km_price',
        'wait_price',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

}
