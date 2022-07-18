<?php

namespace App\Http\Controllers;

use App\Models\Dresses;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\DressesResources;
use App\Http\Resources\DressesCollection;
use Reviewable;



class DressesController extends Controller


{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all dresses
        $dress = Dresses::all();
        
        return new DressesCollection($dress);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //image upload
       
        if($request->hasFile('image')){
            $image = $request->file('image');
            $new_name = rand() . '.' .$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/images'),$new_name);

        }else{
            return response()->json('Image is empty');
        }

        //dresses
        $dress = new Dresses();

        $dress->name = $request->input('name');
        $dress->price = $request->input('price');
        $dress->size = $request->input('size');
        $dress->image = Storage::url($new_name);

        $dress->save();

        return new DressesResources($dress);
    }


    //dress review

    use Reviewable;
    //using the traits to add a review to the dress model
    public function addDressReview(Request $request, Dresses $dresses)
    {
        $review = $this->addReview($request, $dresses);
       
        return $review;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
