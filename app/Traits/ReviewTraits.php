<?php

use Illuminate\Http\Request;

trait Reviewable 
{
    public function addReview(Request $request, $model)
    {

    //validate
    $this->validate($request, [
        'message' => ['string'],
        'ratings' => ['integer']
        
        ]);


        //save data

        return $model->reviews()->create([
            'message' => $request->message,
            'ratings' => $request->ratings
            ]);

        }
}


