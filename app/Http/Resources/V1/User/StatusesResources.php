<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class StatusesResources extends JsonResource
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
            'id' => $this->id,
            'key' => $this->key,
            'title' => $this->title,
            'sort' => $this->sort,
        ];
    }
}
