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
                'suspend'=>0,
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
                'suspend'=>0,
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
                'suspend'=>0,
                'email_verified_at'=>Carbon::now(),
            ],

        ];
        foreach ($data as $get) {
            Driver::updateOrCreate($get);
        }
    }
}
