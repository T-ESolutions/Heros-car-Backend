<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartmentsSeeder::class);
        $this->call(BrandsSeeder::class);
        $this->call(ColorsSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CarCategorySeeder::class);
        $this->call(DriversSeeder::class);
        $this->call(DriverCarSeeder::class);
        $this->call(DriverCarDepartmentSeeder::class);
        $this->call(TripSeeder::class);

        $this->call(ScreenSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
