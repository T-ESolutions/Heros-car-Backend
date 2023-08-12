<?php

namespace Database\Seeders;

use App\Models\CarCategory;
use App\Models\Color;
use App\Models\Department;
use Illuminate\Database\Seeder;

class CarCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = Department::get();

        $data = [
            [
                'title' => 'سيارات عادية',
                'start_price' => 5,
                'min_price' => 10,
                'km_price' => 1.5,
                'wait_price' => 1,
            ],
            [
                'title' => 'سيارات متوسطة',
                'start_price' => 7.5,
                'min_price' => 15,
                'km_price' => 2.5,
                'wait_price' => 2,
            ],
            [
                'title' => 'سيارات فارهة',
                'start_price' => 9.5,
                'min_price' => 20,
                'km_price' => 3.5,
                'wait_price' => 3,
            ]
        ];

        foreach ($departments as $department) {
            foreach ($data as $d) {
                CarCategory::create(array_merge($d,['department_id' => $department->id]));
            }
        }

    }
}
