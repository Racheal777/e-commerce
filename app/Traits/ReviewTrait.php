<?php

namespace App\Traits;
use App\Traits;

use Illuminate\Http\Request;

trait ReviewTrait 
{
    public function addReview(Request $request, $model)
    {

    //validate
    // $this->validate($request, [
    //     'message' => ['string'],
    //     'ratings' => ['integer']
        
    //     ]);


        //save data

        return $model->reviews()->create([
            'message' => $request->message,
            'ratings' => $request->ratings,
            'user_id' => $request->user_id
        ]);

    }
}


