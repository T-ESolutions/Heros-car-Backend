<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
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
                'key' => 'name_ar',
                'value' => 'هيروز كارز',

            ], [
                'key' => 'name_en',
                'value' => 'Heroes cars',
            ],
            [
                'key' => 'address_ar',
                'value' => 'عنوان شركة ',
            ], [
                'key' => 'address_en',
                'value' => 'The address ',
            ],
            [
                'key' => 'phone_1',
                'value' => '01201636129',

            ], [
                'key' => 'phone_2',
                'value' => '01094641332',

            ], [
                'key' => 'email_1',
                'value' => 'proten_chef@gmail.com',

            ], [
                'key' => 'email_2',
                'value' => 'proten2_chef@gmail.com',

            ], [
                'key' => 'whatsapp',
                'value' => '01094641332',

            ], [
                'key' => 'facebook',
                'value' => 'https://www.facebook.com/',

            ], [
                'key' => 'twitter',
                'value' => 'https://www.facebook.com/',

            ], [
                'key' => 'instagram',
                'value' => 'https://www.facebook.com/',
            ], [
                'key' => 'snapchat',
                'value' => 'https://www.facebook.com/',
            ], [
                'key' => 'youtube',
                'value' => 'https://www.facebook.com/',
            ],
            [
                'key' => 'logo_ar',
                'value' => 'logo.png',
            ], [
                'key' => 'logo_en',
                'value' => 'logo.png',
            ], [
                'key' => 'fav_icon',
                'value' => 'food.ico',
            ],
            [
                'key' => 'default_location',
                'value' => '{"lat":"29.172909419416","lng":"47.76978786947689"}',
            ],
            [
                'key' => 'user_trip_terms_ar',
                'value' => 'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه … بروشور او فلاير على سبيل المثال … او نماذج مواقع انترنت',
            ],
            [
                'key' => 'user_trip_terms_ar',
                'value' => 'Lorem Ipsum is a virtual model that is placed in the designs to be presented to the client to imagine the way to put texts in the designs, whether they are printed designs ... a brochure or flyer for example ... or models for websites',
            ],
        ];
        foreach ($data as $get) {
            Setting::updateOrCreate($get);
        }
    }
}
