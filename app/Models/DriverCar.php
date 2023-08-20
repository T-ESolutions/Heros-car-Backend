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

    protected $appends = ['brand_name','modell_name','color_name'];

    public function getBrandNameAttribute(){
        if(request()->header('lang') == 'en')
            return $this->brand()->first()->title_en;
        return $this->brand()->first()->title_ar;
    }
    public function getModellNameAttribute(){
        if(request()->header('lang') == 'en')
            return $this->modell()->first()->title_en;
        return $this->modell()->first()->title_ar;
    }
    public function getColorNameAttribute(){
        if(request()->header('lang') == 'en')
            return $this->color()->first()->title_en;
        return $this->color()->first()->title_ar;
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function modell(){
        return $this->belongsTo(Modell::class,'modell_id');
    }
    public function color(){
        return $this->belongsTo(Color::class,'color_id');
    }
}
