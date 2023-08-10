<?php

namespace App\Http\Resources\V1\User;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        //  'summary_data' => [
        //                'rate' => $this->target->rate,
        //                'reviews_number' => $this->target->reviewsReached->count(),
        //                'excellent' => $this->target->reviewsReached->where('rate', 5)->count(), //5
        //                'good' => $this->target->reviewsReached->where('rate', 4)->count(),//4
        //                'average' => $this->target->reviewsReached->where('rate', 3)->count(),//3
        //                'below_average' => $this->target->reviewsReached->where('rate', 2)->count(),//2
        //                'poor' => $this->target->reviewsReached->where('rate', 1)->count(),//1
        //            ],
        return [
            'user_name' => isset($this->writer) ? $this->writer->name : '',
            'user_image' => isset($this->writer) ? $this->writer->image : '',
            'rate' => isset($this->rate) ? $this->rate : 0,
            'comment' => isset($this->comment) ? $this->comment : '',
            'date' => isset($this->created_at) ? Carbon::parse($this->created_at)->diffForHumans() : '',

        ];
    }
}
