<?php

namespace Database\Seeders;

use App\Models\CarCategory;
use App\Models\Department;
use App\Models\Driver;
use App\Models\DriverCar;
use App\Models\DriverCarDepartment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverCarDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = Department::get();
        $driverCars = DriverCar::get();

        foreach ($departments as $department) {
            foreach ($driverCars as $driverCar) {
                DriverCarDepartment::create([
                    'driver_id' => $driverCar->driver_id,
                    'department_parent_id' => $department->parent_id,
                    'department_id' => $department->id,
                    'driver_car_id' => $driverCar->id,
                    'car_category_id' => CarCategory::where('department_id',$department->id)->inRandomOrder()->first()->id
                ]);
            }
        }
    }
}
