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
      'air',
      'bags',
      'lat',
      'lng',
      'address_ar',
      'address_en',
      'brand_id',
      'brand_ar',
      'brand_en',
      'brand_image',
      'modell_id',
      'modell_ar',
      'modell_en',
      'modell_image',
    ];
}
