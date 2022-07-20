<?php

namespace App\Http\Resources;

use App\Models\Reviews;
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
        $user = new UsersResource($creator);

        $reviewed = new ReviewableResource($this->reviewable);
        return
         [
            'user' => $user,
            'id' => $this->id,
            'message' => $this->message,
            'ratings' => $this->ratings,
            'reviewed_item' => $reviewed

        ];
    }
}
