<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name'=>"Demo User",
                'email'=>"user@user.com",
                'country_code'=>"+20",
                'phone'=>"1095187616",
                'user_phone'=>"+201095187616",
                'password'=>"123456",
                'rate'=>"0",
                'image'=>null,
                'social_id'=>null,
                'social_type'=>null,
                'active'=>1,
                'suspend'=>0,
                'fcm_token'=>"asassasasasasa",
                'email_verified_at'=>Carbon::now(),
                'ios_deleted_at'=>null,
                'device_token'=>"aaaaaa",
            ],

        ];
        foreach ($data as $get) {
            User::updateOrCreate($get);
        }
    }
}
