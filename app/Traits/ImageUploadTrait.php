<?php

namespace App\Traits;
use Illuminate\Http\Request;

trait ImageUploadTrait 
{
    public function imageUpload(Request $request)
    {


        //validating the image
        $this->validate($request, [
            'image' => ['required', 'image', 'max:1024', 'mimes:jpeg,png,jpg,gif']
         ]);
        //return 'image uploaded';
       


        if($request->hasFile('image')){
            $image = $request->file('image');
            $new_name = rand() . '.' .$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/images'),$new_name);
            
           //$image = $image->$new_name;

           return $new_name;


        }else{
            return response()->json('Image is empty');
        }
    }
}