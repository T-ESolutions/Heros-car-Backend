<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriversSeeder extends Seeder
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
                'name'=>"Demo Driver",
                'email'=>"driver@gmail.com",
                'phone'=>"01099999991",
                'password'=>"123456",
                'image'=>'driver_image.png',
                'driver_licence_image'=>'driver_licence_image.png',
                'id_number'=>'29508221302411',
                'active'=>1,
                'accept'=>1,
                'suspend'=>0,
                'gender'=>'male',
                'email_verified_at'=>Carbon::now(),
            ],
            [
                'name'=>"Demo2 Driver",
                'email'=>"driver2@gmail.com",
                'phone'=>"01099999992",
                'password'=>"123456",
                'image'=>'driver_image.png',
                'driver_licence_image'=>'driver_licence_image.png',
                'id_number'=>'29508221302412',
                'active'=>1,
                'accept'=>1,
                'suspend'=>0,
                'gender'=>'male',
                'email_verified_at'=>Carbon::now(),
            ],
            [
                'name'=>"Demo3 Driver",
                'email'=>"driver3@gmail.com",
                'phone'=>"01099999993",
                'password'=>"123456",
                'image'=>'driver_image.png',
                'driver_licence_image'=>'driver_licence_image.png',
                'id_number'=>'29508221302413',
                'active'=>1,
                'accept'=>1,
                'suspend'=>0,
                'gender'=>'male',
                'email_verified_at'=>Carbon::now(),
            ],
            [
                'name'=>"Demo4 Driver",
                'email'=>"driver4@gmail.com",
                'phone'=>"01099999994",
                'password'=>"123456",
                'image'=>'driver_image.png',
                'driver_licence_image'=>'driver_licence_image.png',
                'id_number'=>'29508221302414',
                'active'=>1,
                'accept'=>1,
                'suspend'=>0,
                'gender'=>'female',
                'email_verified_at'=>Carbon::now(),
            ],
            [
                'name'=>"Demo5 Driver",
                'email'=>"driver5@gmail.com",
                'phone'=>"01099999995",
                'password'=>"123456",
                'image'=>'driver_image.png',
                'driver_licence_image'=>'driver_licence_image.png',
                'id_number'=>'29508221302415',
                'active'=>1,
                'accept'=>1,
                'suspend'=>0,
                'gender'=>'female',
                'email_verified_at'=>Carbon::now(),
            ],

        ];
        foreach ($data as $get) {
            Driver::create($get);
        }
    }
}
