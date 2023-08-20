<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands_data = [
            [
                'title_ar'  =>   'احمر',
                'title_en'  =>   'red',
            ],
            [
                'title_ar'  =>   'ابيض',
                'title_en'  =>   'white',
            ],
            [
                'title_ar'  =>   'اسود',
                'title_en'  =>   'black',
            ],
            [
                'title_ar'  =>   'رمادي',
                'title_en'  =>   'gray',
            ],
        ];
        foreach ($brands_data as $get) {
            Color::updateOrCreate($get);
        }
    }
}
