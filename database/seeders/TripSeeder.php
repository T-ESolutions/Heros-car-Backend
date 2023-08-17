<?php

namespace Database\Seeders;

use App\Models\DriverCar;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //first driver (male)
            [
                'trip_number'=>rand(100000000,999999999),
                'driver_id'=>1,
                'department_id'=>1, //Economic Trip
                'driver_car_id'=>1,
                'brand_id' => DriverCar::whereId(1)->first()->brand_id,
                'modell_id' => DriverCar::whereId(1)->first()->modell_id,
                'color_id' => DriverCar::whereId(1)->first()->color_id,
                'trip_date'=>Carbon::now()->addDays(5),
                'trip_time_from'=>Carbon::now()->format('H:i'),
                'trip_time_to'=>Carbon::now()->addHours(4)->format('H:i'),
                'chairs'=>3,
                'air_cond'=>1,
                'bags'=>0,
                'from_lat'=>'30.0594628',
                'from_lng'=>'31.176063',
                'from_address_ar'=>'القاهرة',
                'from_address_en'=>'Cairo',
                'to_lat'=>'31.2240058',
                'to_lng'=>'29.7900756',
                'to_address_ar'=>'الاسكندرية',
                'to_address_en'=>'Alex',
                'end_lat'=>null,
                'end_lng'=>null,
                'end_address_ar'=>null,
                'end_address_en'=>null,
                'started_at'=>null,
                'finished_at'=>null,
                'cancelled_at'=>null,
                'cancel_reason'=>null,
            ],
            [
                'trip_number'=>rand(100000000,999999999),
                'driver_id'=>1,
                'department_id'=>1, //Economic Trip
                'driver_car_id'=>1,
                'brand_id' => DriverCar::whereId(1)->first()->brand_id,
                'modell_id' => DriverCar::whereId(1)->first()->modell_id,
                'color_id' => DriverCar::whereId(1)->first()->color_id,
                'trip_date'=>Carbon::now()->addDays(10),
                'trip_time_from'=>Carbon::now()->format('H:i'),
                'trip_time_to'=>Carbon::now()->addHours(6)->format('H:i'),
                'chairs'=>3,
                'air_cond'=>0,
                'bags'=>1,
                'from_lat'=>'30.0594628',
                'from_lng'=>'31.176063',
                'from_address_ar'=>'القاهرة',
                'from_address_en'=>'Cairo',
                'to_lat'=>'27.1770702',
                'to_lng'=>'31.1638185',
                'to_address_ar'=>'اسيوط',
                'to_address_en'=>'Assiut',
                'end_lat'=>null,
                'end_lng'=>null,
                'end_address_ar'=>null,
                'end_address_en'=>null,
                'started_at'=>null,
                'finished_at'=>null,
                'cancelled_at'=>null,
                'cancel_reason'=>null,
            ],
            //---------------
            //second driver (male)
            [
                'trip_number'=>rand(100000000,999999999),
                'driver_id'=>2,
                'department_id'=>1, //Economic Trip
                'driver_car_id'=>2,
                'brand_id' => DriverCar::whereId(2)->first()->brand_id,
                'modell_id' => DriverCar::whereId(2)->first()->modell_id,
                'color_id' => DriverCar::whereId(2)->first()->color_id,
                'trip_date'=>Carbon::now()->addDays(5),
                'trip_time_from'=>Carbon::now()->format('H:i'),
                'trip_time_to'=>Carbon::now()->addHours(4)->format('H:i'),
                'chairs'=>3,
                'air_cond'=>1,
                'bags'=>0,
                'from_lat'=>'30.0594628',
                'from_lng'=>'31.176063',
                'from_address_ar'=>'القاهرة',
                'from_address_en'=>'Cairo',
                'to_lat'=>'31.2240058',
                'to_lng'=>'29.7900756',
                'to_address_ar'=>'الاسكندرية',
                'to_address_en'=>'Alex',
                'end_lat'=>null,
                'end_lng'=>null,
                'end_address_ar'=>null,
                'end_address_en'=>null,
                'started_at'=>null,
                'finished_at'=>null,
                'cancelled_at'=>null,
                'cancel_reason'=>null,
            ],
            [
                'trip_number'=>rand(100000000,999999999),
                'driver_id'=>2,
                'department_id'=>1, //Economic Trip
                'driver_car_id'=>2,
                'brand_id' => DriverCar::whereId(2)->first()->brand_id,
                'modell_id' => DriverCar::whereId(2)->first()->modell_id,
                'color_id' => DriverCar::whereId(2)->first()->color_id,
                'trip_date'=>Carbon::now()->addDays(10),
                'trip_time_from'=>Carbon::now()->format('H:i'),
                'trip_time_to'=>Carbon::now()->addHours(6)->format('H:i'),
                'chairs'=>3,
                'air_cond'=>0,
                'bags'=>1,
                'from_lat'=>'30.0594628',
                'from_lng'=>'31.176063',
                'from_address_ar'=>'القاهرة',
                'from_address_en'=>'Cairo',
                'to_lat'=>'27.1770702',
                'to_lng'=>'31.1638185',
                'to_address_ar'=>'اسيوط',
                'to_address_en'=>'Assiut',
                'end_lat'=>null,
                'end_lng'=>null,
                'end_address_ar'=>null,
                'end_address_en'=>null,
                'started_at'=>null,
                'finished_at'=>null,
                'cancelled_at'=>null,
                'cancel_reason'=>null,
            ],
            //third driver (male)
            [
                'trip_number'=>rand(100000000,999999999),
                'driver_id'=>3,
                'department_id'=>1, //Economic Trip
                'driver_car_id'=>3,
                'brand_id' => DriverCar::whereId(3)->first()->brand_id,
                'modell_id' => DriverCar::whereId(3)->first()->modell_id,
                'color_id' => DriverCar::whereId(3)->first()->color_id,
                'trip_date'=>Carbon::now()->addDays(5),
                'trip_time_from'=>Carbon::now()->format('H:i'),
                'trip_time_to'=>Carbon::now()->addHours(4)->format('H:i'),
                'chairs'=>3,
                'air_cond'=>1,
                'bags'=>0,
                'from_lat'=>'30.0594628',
                'from_lng'=>'31.176063',
                'from_address_ar'=>'القاهرة',
                'from_address_en'=>'Cairo',
                'to_lat'=>'31.2240058',
                'to_lng'=>'29.7900756',
                'to_address_ar'=>'الاسكندرية',
                'to_address_en'=>'Alex',
                'end_lat'=>null,
                'end_lng'=>null,
                'end_address_ar'=>null,
                'end_address_en'=>null,
                'started_at'=>null,
                'finished_at'=>null,
                'cancelled_at'=>null,
                'cancel_reason'=>null,
            ],
            [
                'trip_number'=>rand(100000000,999999999),
                'driver_id'=>3,
                'department_id'=>1, //Economic Trip
                'driver_car_id'=>3,
                'brand_id' => DriverCar::whereId(3)->first()->brand_id,
                'modell_id' => DriverCar::whereId(3)->first()->modell_id,
                'color_id' => DriverCar::whereId(3)->first()->color_id,
                'trip_date'=>Carbon::now()->addDays(10),
                'trip_time_from'=>Carbon::now()->format('H:i'),
                'trip_time_to'=>Carbon::now()->addHours(6)->format('H:i'),
                'chairs'=>3,
                'air_cond'=>0,
                'bags'=>1,
                'from_lat'=>'30.0594628',
                'from_lng'=>'31.176063',
                'from_address_ar'=>'القاهرة',
                'from_address_en'=>'Cairo',
                'to_lat'=>'27.1770702',
                'to_lng'=>'31.1638185',
                'to_address_ar'=>'اسيوط',
                'to_address_en'=>'Assiut',
                'end_lat'=>null,
                'end_lng'=>null,
                'end_address_ar'=>null,
                'end_address_en'=>null,
                'started_at'=>null,
                'finished_at'=>null,
                'cancelled_at'=>null,
                'cancel_reason'=>null,
            ],
            //forth driver (female)
            [
                'trip_number'=>rand(100000000,999999999),
                'driver_id'=>5,
                'department_id'=>3, // Bink Car
                'driver_car_id'=>5,
                'brand_id' => DriverCar::whereId(4)->first()->brand_id,
                'modell_id' => DriverCar::whereId(4)->first()->modell_id,
                'color_id' => DriverCar::whereId(4)->first()->color_id,
                'trip_date'=>Carbon::now()->addDays(5),
                'trip_time_from'=>Carbon::now()->format('H:i'),
                'trip_time_to'=>Carbon::now()->addHours(4)->format('H:i'),
                'chairs'=>3,
                'air_cond'=>1,
                'bags'=>0,
                'from_lat'=>'30.0594628',
                'from_lng'=>'31.176063',
                'from_address_ar'=>'القاهرة',
                'from_address_en'=>'Cairo',
                'to_lat'=>'31.2240058',
                'to_lng'=>'29.7900756',
                'to_address_ar'=>'الاسكندرية',
                'to_address_en'=>'Alex',
                'end_lat'=>null,
                'end_lng'=>null,
                'end_address_ar'=>null,
                'end_address_en'=>null,
                'started_at'=>null,
                'finished_at'=>null,
                'cancelled_at'=>null,
                'cancel_reason'=>null,
            ],
            [
                'trip_number'=>rand(100000000,999999999),
                'driver_id'=>4,
                'department_id'=>3, // Bink Car
                'driver_car_id'=>4,
                'brand_id' => DriverCar::whereId(4)->first()->brand_id,
                'modell_id' => DriverCar::whereId(4)->first()->modell_id,
                'color_id' => DriverCar::whereId(4)->first()->color_id,
                'trip_date'=>Carbon::now()->addDays(10),
                'trip_time_from'=>Carbon::now()->format('H:i'),
                'trip_time_to'=>Carbon::now()->addHours(6)->format('H:i'),
                'chairs'=>3,
                'air_cond'=>0,
                'bags'=>1,
                'from_lat'=>'30.0594628',
                'from_lng'=>'31.176063',
                'from_address_ar'=>'القاهرة',
                'from_address_en'=>'Cairo',
                'to_lat'=>'27.1770702',
                'to_lng'=>'31.1638185',
                'to_address_ar'=>'اسيوط',
                'to_address_en'=>'Assiut',
                'end_lat'=>null,
                'end_lng'=>null,
                'end_address_ar'=>null,
                'end_address_en'=>null,
                'started_at'=>null,
                'finished_at'=>null,
                'cancelled_at'=>null,
                'cancel_reason'=>null,
            ],
            //fifth driver (female)
            [
                'trip_number'=>rand(100000000,999999999),
                'driver_id'=>5,
                'department_id'=>3, // Bink Car
                'driver_car_id'=>5,
                'brand_id' => DriverCar::whereId(5)->first()->brand_id,
                'modell_id' => DriverCar::whereId(5)->first()->modell_id,
                'color_id' => DriverCar::whereId(5)->first()->color_id,
                'trip_date'=>Carbon::now()->addDays(5),
                'trip_time_from'=>Carbon::now()->format('H:i'),
                'trip_time_to'=>Carbon::now()->addHours(4)->format('H:i'),
                'chairs'=>3,
                'air_cond'=>1,
                'bags'=>0,
                'from_lat'=>'30.0594628',
                'from_lng'=>'31.176063',
                'from_address_ar'=>'القاهرة',
                'from_address_en'=>'Cairo',
                'to_lat'=>'31.2240058',
                'to_lng'=>'29.7900756',
                'to_address_ar'=>'الاسكندرية',
                'to_address_en'=>'Alex',
                'end_lat'=>null,
                'end_lng'=>null,
                'end_address_ar'=>null,
                'end_address_en'=>null,
                'started_at'=>null,
                'finished_at'=>null,
                'cancelled_at'=>null,
                'cancel_reason'=>null,
            ],
            [
                'trip_number'=>rand(100000000,999999999),
                'driver_id'=>5,
                'department_id'=>3, // Bink Car
                'driver_car_id'=>5,
                'brand_id' => DriverCar::whereId(5)->first()->brand_id,
                'modell_id' => DriverCar::whereId(5)->first()->modell_id,
                'color_id' => DriverCar::whereId(5)->first()->color_id,
                'trip_date'=>Carbon::now()->addDays(10),
                'trip_time_from'=>Carbon::now()->format('H:i'),
                'trip_time_to'=>Carbon::now()->addHours(6)->format('H:i'),
                'chairs'=>3,
                'air_cond'=>0,
                'bags'=>1,
                'from_lat'=>'30.0594628',
                'from_lng'=>'31.176063',
                'from_address_ar'=>'القاهرة',
                'from_address_en'=>'Cairo',
                'to_lat'=>'27.1770702',
                'to_lng'=>'31.1638185',
                'to_address_ar'=>'اسيوط',
                'to_address_en'=>'Assiut',
                'end_lat'=>null,
                'end_lng'=>null,
                'end_address_ar'=>null,
                'end_address_en'=>null,
                'started_at'=>null,
                'finished_at'=>null,
                'cancelled_at'=>null,
                'cancel_reason'=>null,
            ],

        ];
        foreach ($data as $get) {
            Trip::updateOrCreate($get);
        }
    }
}
