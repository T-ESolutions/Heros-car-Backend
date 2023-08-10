<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable=[
        'parent_id',
        'title_ar',
        'title_en',
        'body_ar',
        'body_en',
        'image',
        'active',
        'locations_num',
    ];
}
