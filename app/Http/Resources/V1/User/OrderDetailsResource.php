<?php

namespace App\Http\Resources\V1\User;

use App\Http\Resources\ServicesResources;
use App\Http\Resources\V1\Driver\MyOrdersUserResources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = request()->header('lang') == 'ar' ? 'ar' : 'en';

        $service = json_decode($this->service_data);
        $brand = json_decode($this->brand_data);
        $modell = json_decode($this->modell_data);

        return [
            'id' => $this->id,
            'user' => $this->user ? new MyOrdersUserResources($this->user) : null,
            'provider' => $this->provider ? new MyOrdersProviderResources($this->provider) : null,
            'order_number' => $this->order_number,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'status_key' => (string)$this->status_key,
            'next_status_action' => isset($this->nextOrderStatus) ? $this->nextOrderStatus : null,
            'Status_history' => OrderStatusResource::collection($this->Order_status),
            'location_summary' => $this->orderAddress,
            'service_summary' => [
                'service' => ($lang == 'ar') ? $service->title_ar : $service->title_en,
                'service_cost' => $this->service_cost,
            ],
            'extra_service_summary' => $this->Order_extra_services,
            'vehicle_information' => [
                'brand' => ($lang == 'ar') ? $brand->title_ar : $brand->title_en,
                'model' => ($lang == 'ar') ? $modell->title_ar : $modell->title_en,
                'year' => $this->car_year,
                'color' => $this->car_color,
            ],
            'car_live_photos' =>  $this->Provider_Order_images,
            'additional_info' => [
                'images' => $this->User_Order_images,
                'description' => $this->notes
            ],
            'Questions' => OrderQuestionResource::collection($this->Order_Questions),
            'invoice' => [
                'Distance' => $this->distance,
                'Price_p/k' => $this->price_km,
                'Distance_cost' => $this->price_km_cost,
                'free_km' => $this->free_km,
                'free_km_cost' => $this->free_km_cost,
                'total_distance_cost' => $this->total_distance_cost,
                'extra_service_cost' => $this->extra_service_cost,
                'car_brand_cost' => $this->car_category_cost,
                'discount' => $this->discount,
                'vat' => $this->vat,
                'total_cost' => $this->total_cost,
            ]

        ];
    }
}
