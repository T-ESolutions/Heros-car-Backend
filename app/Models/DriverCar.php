<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'approved',
        'available',
        'driver_id',
        'color_id',
        'color_ar',
        'color_en',
        'car_image',
        'car_licence_image',
        'document_image',
        'car_plate_num',
        'car_plate_txt',
        'factory_year',
        'car_body_id',
        'chairs',
        'air_cond',
        'bags',
        'lat',
        'lng',
        'address_ar',
        'address_en',
        'brand_id',
        'modell_id',
    ];

    protected $appends = ['brand_name', 'modell_name', 'color_name', 'description'];

    public function getBrandNameAttribute()
    {
        if (request()->header('lang') == 'en')
            return $this->brand()->first()->title_en;
        return $this->brand()->first()->title_ar;
    }

    public function getModellNameAttribute()
    {
        if (request()->header('lang') == 'en')
            return $this->modell()->first()->title_en;
        return $this->modell()->first()->title_ar;
    }

    public function getColorNameAttribute()
    {
        if (request()->header('lang') == 'en')
            return $this->color()->first()->title_en;
        return $this->color()->first()->title_ar;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function modell()
    {
        return $this->belongsTo(Modell::class, 'modell_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function departments_relation()
    {
        return $this->hasMany(DriverCarDepartment::class, 'driver_car_id');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'driver_car_departments', 'driver_car_id', 'department_id');
    }

    public function getCarImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/car_images') . '/' . $image;
        }
        return asset('defaults/default_car.png');
    }

    public function setCarImageAttribute($image)
    {
        $img_name =  uniqid() . '_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/uploads/car_images/'), $img_name);
        $this->attributes['image'] = $img_name;
//        if (is_file($image)) {
//            $img_name = upload($image, 'car_images');
//            $this->attributes['car_image'] = $img_name;
//        } else {
//            $this->attributes['car_image'] = $image;
//        }
    }

    public function getCarLicenceImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/car_licence_images') . '/' . $image;
        }
        return asset('defaults/default_car.png');
    }

    public function setCarLicenceImageAttribute($image)
    {
        $img_name =  uniqid() . '_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/uploads/car_licence_images/'), $img_name);
        $this->attributes['image'] = $img_name;
//        if (is_file($image)) {
//            $img_name = upload($image, 'car_licence_images');
//            $this->attributes['car_licence_image'] = $img_name;
//        } else {
//            $this->attributes['car_licence_image'] = $image;
//        }
    }

    public function getDocumentImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/document_images') . '/' . $image;
        }
        return asset('defaults/default_car.png');
    }

    public function setDocumentImageAttribute($image)
    {
        $img_name =  uniqid() . '_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/uploads/document_images/'), $img_name);
        $this->attributes['image'] = $img_name;
//        if (is_file($image)) {
//            $img_name = upload($image, 'document_images');
//            $this->attributes['document_image'] = $img_name;
//        } else {
//            $this->attributes['document_image'] = $image;
//        }
    }

    public function getDescriptionAttribute()
    {
        $section_ids = $this->departments->pluck('department_id')->toArray();
        if (\app()->getLocale() == "ar") {
            if (empty($this->desc_ar))
                return implode(", ", Department::whereIn('id', $section_ids)->pluck('title_ar')->toArray());
            else
                return $this->desc_ar;
        } else {
            if (empty($this->desc_en))
                return implode(", ", Department::whereIn('id', $section_ids)->pluck('title_en')->toArray());
            else
                return $this->desc_en;
        }
    }


}
