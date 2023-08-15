<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\DriverCar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'approved' => 1,
                'available' => 1,
                'driver_id' => 1,
                'color_id' => 1,
                'color_ar' => 'احمر',
                'color_en' => 'red',
                'car_image' => "driver_image.png",
                'car_licence_image' => "driver_image.png",
                'document_image' => null,
                'car_plate_num' => "123",
                'car_plate_txt' => "أ أ أ",
                'factory_year' => 2010,
                'car_body_id' => "123456781",
                'chairs' => 4,
                'air_cond' => 1,
                'bags' => 1,
                'lat' => '31.43563',
                'lng' => '30.45366534',
                'address_ar' => 'العباسية ميدان الوايلي',
                'address_en' => 'Abbassia waili square',
                'brand_id' => 1,
                'modell_id' => 1,
            ],
            [
                'approved' => 1,
                'available' => 1,
                'driver_id' => 2,
                'color_id' => 2,
                'color_ar' => 'ابيض',
                'color_en' => 'white',
                'car_image' => "driver_image.png",
                'car_licence_image' => "driver_image.png",
                'document_image' => null,
                'car_plate_num' => "123",
                'car_plate_txt' => "ب ب ب",
                'factory_year' => 2011,
                'car_body_id' => "123456782",
                'chairs' => 4,
                'air_cond' => 0,
                'bags' => 0,
                'lat' => '31.43563',
                'lng' => '30.45366534',
                'address_ar' => 'العباسية ميدان الوايلي',
                'address_en' => 'Abbassia waili square',
                'brand_id' => 2,
                'modell_id' => 4,
            ],
            [
                'approved' => 1,
                'available' => 1,
                'driver_id' => 3,
                'color_id' => 3,
                'color_ar' => 'اسود',
                'color_en' => 'black',
                'car_image' => "driver_image.png",
                'car_licence_image' => "driver_image.png",
                'document_image' => null,
                'car_plate_num' => "123",
                'car_plate_txt' => "ج ج ج",
                'factory_year' => 2012,
                'car_body_id' => "123456783",
                'chairs' => 7,
                'air_cond' => 1,
                'bags' => 1,
                'lat' => '31.43563333',
                'lng' => '30.45366534',
                'address_ar' => 'العباسية ميدان الوايلي3',
                'address_en' => 'Abbassia waili square3',
                'brand_id' => 3,
                'modell_id' => 6,
            ],
            [
                'approved' => 1,
                'available' => 1,
                'driver_id' => 4,
                'color_id' => 2,
                'color_ar' => 'ابيض',
                'color_en' => 'white',
                'car_image' => "driver_image.png",
                'car_licence_image' => "driver_image.png",
                'document_image' => null,
                'car_plate_num' => "888",
                'car_plate_txt' => "د د د",
                'factory_year' => 2013,
                'car_body_id' => "123456784",
                'chairs' => 4,
                'air_cond' => 0,
                'bags' => 0,
                'lat' => '31.43563',
                'lng' => '30.45366534',
                'address_ar' => 'العباسية ميدان الوايلي',
                'address_en' => 'Abbassia waili square',
                'brand_id' => 2,
                'modell_id' => 4,
            ],
            [
                'approved' => 1,
                'available' => 1,
                'driver_id' => 5,
                'color_id' => 3,
                'color_ar' => 'اسود',
                'color_en' => 'black',
                'car_image' => "driver_image.png",
                'car_licence_image' => "driver_image.png",
                'document_image' => null,
                'car_plate_num' => "565",
                'car_plate_txt' => "و و و",
                'factory_year' => 2015,
                'car_body_id' => "123456785",
                'chairs' => 7,
                'air_cond' => 1,
                'bags' => 1,
                'lat' => '31.43563333',
                'lng' => '30.45366534',
                'address_ar' => 'العباسية ميدان الوايلي3',
                'address_en' => 'Abbassia waili square3',
                'brand_id' => 3,
                'modell_id' => 6,
            ],

        ];
        foreach ($data as $get) {
            DriverCar::create($get);
        }
    }
}
