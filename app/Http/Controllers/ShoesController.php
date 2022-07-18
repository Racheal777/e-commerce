<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShoesResource;
use App\Models\Shoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Reviewable;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->hasFile('image')){
            $image = $request->file('image');
            $new_name = rand() . '.' .$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/images'),$new_name);

        }else{
            return response()->json('Image is empty');
        }

        //dresses
        $shoes = new Shoes();

        $shoes->name = $request->input('name');
        $shoes->price = $request->input('price');
        $shoes->size = $request->input('size');
        $shoes->image = Storage::url($new_name);

        $shoes->save();

        return new ShoesResource( $shoes);
    }


    //add review
    use Reviewable;
    public function addShoeReview(Request $request, Shoes $shoes)
    {
        $review = $this->addReview($request, $shoes);
       
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
