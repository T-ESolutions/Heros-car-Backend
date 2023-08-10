<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
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
                'key' => 'requested',
                'title_ar' => 'قيد القبول',
                'title_en' => 'requested',
                'active' => 1,
                'sort' => 1,
                'appear_in_app' => 'user',
            ],
            [
                'key' => 'provider_accept',
                'title_ar' => 'قبول مقدم الخدمة',
                'title_en' => 'provider accept',
                'active' => 1,
                'sort' => 2,
                'appear_in_app' => 'provider',
            ],
            [
                'key' => 'offer_send',
                'title_ar' => 'ارسال عرض',
                'title_en' => 'offer send',
                'active' => 1,
                'sort' => 3,
                'appear_in_app' => 'provider',
            ],
            [
                'key' => 'offer_accepted',
                'title_ar' => 'قبول العرض',
                'title_en' => 'offer accepted',
                'active' => 1,
                'sort' => 4,
                'appear_in_app' => 'user',
            ],
            [
                'key' => 'provider_on_way',
                'title_ar' => 'مقدم الخدمة في الطريق',
                'title_en' => 'provider on way',
                'active' => 1,
                'sort' => 5,
                'appear_in_app' => 'provider',
            ],
            [
                'key' => 'provider_arrived',
                'title_ar' => 'مقدم الخدمة وصل موقع العمل',
                'title_en' => 'provider arrived site',
                'active' => 1,
                'sort' => 6,
                'appear_in_app' => 'provider',
            ],
            [
                'key' => 'order_on_proccessing',
                'title_ar' => 'الطلب قيد التنفيذ',
                'title_en' => 'order on proccessing',
                'active' => 1,
                'sort' => 7,
                'appear_in_app' => 'provider',
            ],
            [
                'key' => 'order_finished',
                'title_ar' => 'تم انهاء الطلب',
                'title_en' => 'order finished',
                'active' => 1,
                'sort' => 8,
                'appear_in_app' => 'provider',
            ],
            [
                'key' => 'cancel_by_user',
                'title_ar' => 'الغاء الطلب من العميل',
                'title_en' => 'cancelled by user',
                'active' => 1,
                'sort' => 9,
                'appear_in_app' => 'user',
            ],
            [
                'key' => 'cancel_by_provider',
                'title_ar' => 'الغاء الطلب من مقدم الخدمة',
                'title_en' => 'cancelled by provider',
                'active' => 1,
                'sort' => 10,
                'appear_in_app' => 'provider',
            ],
            [
                'key' => 'cancel_by_admin',
                'title_ar' => 'الغاء الطلب من مدير النظام',
                'title_en' => 'cancelled by admin',
                'active' => 1,
                'sort' => 11,
                'appear_in_app' => 'admin',
            ],


        ];
        foreach ($data as $get) {
            Status::updateOrCreate($get);
        }
    }
}
