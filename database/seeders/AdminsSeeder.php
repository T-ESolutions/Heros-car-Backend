<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        Admin
        if (!Admin::find(1)) {
            Admin::updateOrCreate([
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '123456',
                'phone' => '123456',
                'type' => 'admin',
                'email_verified_at' => Carbon::now(),
            ]);
        }
    }
}
