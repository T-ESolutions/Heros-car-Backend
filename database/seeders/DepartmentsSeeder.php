<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
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
                'parent_id'     =>  null,
                'title_ar'      =>  'السفر الاقتصادي',
                'title_en'      =>  'Economic Trips',
                'body_ar'       =>  'السفر الاقتصادي هو وسيلة سفر اقتصادية لمسافات طويلة باسعار مخفضة',
                'body_en'       =>  'Economy travel is a way to travel economically over long distances at discount prices',
                'image'         =>  'logo.png',
                'active'        =>  1,
                'locations_num' =>  2,
            ], [
                'parent_id'     =>  null,
                'title_ar'      =>  'تأجير سيارة',
                'title_en'      =>  'Renting Car',
                'body_ar'       =>  'تقدر تأجر سيارة بالسائق وكمان تحدد الساعات اللي محتاج فيها السيارة و كمان تقدر تخلي السائق ينتظر معاك',
                'body_en'       =>  'You can rent a car with the driver, and also specify the hours you need the car, and you can also let the driver wait with you',
                'image'         =>  'logo.png',
                'active'        =>  1,
                'locations_num' =>  2,
            ],
            [
                'parent_id'     =>  null,
                'title_ar'      =>  'بينك كار',
                'title_en'      =>  'Pink Car',
                'body_ar'       =>  'بينك كار هو نوع من السفر الاقتصادي بيكون السائق سيدة وكمان العميل سيدة',
                'body_en'       =>  'Pink Car is a type of economy travel in which the driver is a woman and the client is also a woman',
                'image'         =>  'logo.png',
                'active'        =>  1,
                'locations_num' =>  2,
            ], [
                'parent_id'     =>  2,
                'title_ar'      =>  'مناسبات و أفراح',
                'title_en'      =>  'Occasions and weddings',
                'body_ar'       =>  'مناسبات و أفراح . . . ',
                'body_en'       =>  'Occasions and weddings . . . ',
                'image'         =>  'logo.png',
                'active'        =>  1,
                'locations_num' =>  2,
            ],
            [
                'parent_id'     =>  2,
                'title_ar'      =>  'ذهاب فقط',
                'title_en'      =>  'Going only',
                'body_ar'       =>  'ذهاب فقط . . . ',
                'body_en'       =>  'Going only . . . ',
                'image'         =>  'logo.png',
                'active'        =>  1,
                'locations_num' =>  2,
            ], [
                'parent_id'     =>  2,
                'title_ar'      =>  'ذهاب و عودة و إنتظار',
                'title_en'      =>  'Going, come back and wait',
                'body_ar'       =>  'ذهاب و عودة و إنتظار . . . ',
                'body_en'       =>  'Going, come back and wait . . . ',
                'image'         =>  'logo.png',
                'active'        =>  1,
                'locations_num' =>  3,
            ],
        ];
        foreach ($data as $get) {
            Department::updateOrCreate($get);
        }
    }
}
