<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title_ar',
        'title_en',
        'body_ar',
        'body_en',
        'image',
        'active',
        'locations_num',
    ];

    protected $appends = ['title', 'body'];

    public function getTitleAttribute()
    {
        if (\app()->getLocale() == "ar") {
            return $this->title_ar;
        } else {
            return $this->title_en;
        }
    }

    public function getBodyAttribute()
    {
        if (\app()->getLocale() == "ar") {
            return $this->body_ar;
        } else {
            return $this->body_en;
        }
    }

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/department') . '/' . $image;
        }
        return asset('default.png');
    }

    public function setImageAttribute($image)
    {
//        $img_name =  uniqid() . '_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
//        $image->move(public_path('/uploads/department/'), $img_name);
//        $this->attributes['image'] = $img_name;
        $this->attributes['image'] = $image;
    }


    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }


    public function scopeWithoutParent($query)
    {
        return $query->where('parent_id', null);
    }


    public function children()
    {
        return $this->hasMany(Department::class, 'parent_id');
    }

    public function driver_cars()
    {
        return $this->belongsToMany(Department::class, 'driver_car_departments', 'department_id', 'driver_car_id');
    }


}
