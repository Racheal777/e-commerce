<?php

namespace App\Http\Resources;

use App\Models\Reviews;
use App\Http\Resources\ReviewCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $review = Reviews::all();
        $reviews = new ReviewssResource($review);
        $reviewed = new ReviewableResource($this->reviewable);


        return 
        [
            'id' =>$this->id,
            'name' => $this->name,
            'email' => $this->email,
           'reviews' => $this->reviews,
           'reviewed_item' => $reviewed

        ];
    }
}
