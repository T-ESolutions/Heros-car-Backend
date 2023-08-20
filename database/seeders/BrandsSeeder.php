<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Modell;
use Illuminate\Database\Seeder;

class       BrandsSeeder extends Seeder
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
                'title_ar'      =>   'BMW',
                'title_en'      =>   'BMW',
                'image'         =>   'bmw.jfif',
            ],
            [
                'title_ar'      =>   'هيونداي',
                'title_en'      =>   'hundai',
                'image'         =>   'fiat.jfif',
            ],
            [
                'title_ar'      =>   'فيات',
                'title_en'      =>   'fiat',
                'image'         =>   'Hyundai-Logo.png',
            ],
            [
                'title_ar'      =>   'لانسر',
                'title_en'      =>   'lansaer',
                'image'         =>   'lanser.png',
            ],

        ];
        foreach ($brands_data as $get) {
            $brand = Brand::updateOrCreate($get);
            if ($brand) {
                $modells = [
                    [
                        'title_ar'  =>   '1651',
                        'title_en'  =>   '1651',
                        'brand_id'  =>   $brand->id,
                    ],
                    [
                        'title_ar'  =>   '2581',
                        'title_en'  =>   '2581',
                        'brand_id'  =>   $brand->id,
                    ],
                ];
                foreach ($modells as $row) {
                    Modell::updateOrCreate($row);

                }
            }
        }
    }
}
