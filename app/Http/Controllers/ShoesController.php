<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShoesResource;
use App\Models\Shoes;
use App\Traits\DetailsEntryTrait;
use App\Traits\ImageUploadTrait;
use App\Traits\ReviewTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Reviewable;

class ShoesController extends Controller
{
    use ReviewTrait;
    use ImageUploadTrait;
    use DetailsEntryTrait;
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
    public function store(Request $request, Shoes $shoes)
    {
        //adding a shoe using the details entry trait
        $shoes = new Shoes();
        $shoes = $this->detailsEntry($request, $shoes);

        $shoes->save();

        return new ShoesResource( $shoes);
    }


    //add review
   
    public function addShoeReview(Request $request, Shoes $shoe)
    {
        $review = $this->addReview($request, $shoe);
       
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
