<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewssResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $creator = User::find($this->user_id);
        return
         [
            'id' => $this->id,
            'message' => $this->message,
            'reviewable_type' => $this->reviewable_type,
            'user' => $creator

        ];
    }
}
