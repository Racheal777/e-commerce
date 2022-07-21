<?php

namespace App\Http\Resources;

use App\Models\Reviews;
use Illuminate\Http\Resources\Json\JsonResource;

class DressesResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)


    {
        $review = new ReviewssResource(Reviews::all());
        return 
        [
            'id'=> $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'size' => $this->size,
            'image' => $this->image,
            'reviews' => $review

        ];
    }
}
