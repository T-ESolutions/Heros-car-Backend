<?php

namespace App\Http\Resources\V1\User;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderReviewSummaryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'rate' => $this->rate,
            'reviews_number' =>  $this->reviewsReached->count(),
            'excellent' =>  $this->reviewsReached->where('rate', 5)->count(), //5
            'good' => $this->reviewsReached->where('rate', 4)->count() ,//4
            'average' => $this->reviewsReached->where('rate', 3)->count() ,//3
            'below_average' => $this->reviewsReached->where('rate', 2)->count() ,//2
            'poor' => $this->reviewsReached->where('rate', 1)->count() ,//1

        ];
    }
}
