<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

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
                'name'              =>  "Demo User",
                'email'             =>  "user@gmail.com",
                'phone'             =>  "01099999999",
                'password'          =>  "123456",
                'image'             =>  null,
                'active'            =>  1,
                'suspend'           =>  0,
                'email_verified_at' =>  Carbon::now(),
            ],

        ];
        foreach ($data as $get) {
            User::updateOrCreate($get);
        }
    }
}
