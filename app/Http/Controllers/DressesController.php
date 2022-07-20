<?php

namespace App\Http\Controllers;

use App\Models\Dresses;
use App\Models\Reviews;
use App\Traits\ReviewTrait;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\DressesResources;
use App\Http\Resources\DressesCollection;
use App\Traits\DetailsEntryTrait;

class DressesController extends Controller
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
    public function store(Request $request, Dresses $dress)
    {

        //dresses
        $dress = new Dresses();

        $dress = $this->detailsEntry($request, $dress);
        $dress->save();

        return new DressesResources($dress);
    }
   

    //using the traits to add a review to the dress model
    public function addDressReview(Request $request, Dresses $dress)
    {
        
      //saving the review to the dress model coming from the treit
        $review = $this->addReview($request, $dress);
        return $review;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dresses $dress)
    {
        //
        return new DressesResources($dress);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dresses $dress)
    {

        // $dress->update(['name' => $request->name]);
        // return $dress;
        //

       // return $dress;
        $dress->name = $request->input('name');
        $dress->price = $request->input('price');
        $dress->size = $request->input('size');
        $dress->image = Storage::url($this->imageUpload($request));

        // $dress = $this->detailsEntry($request, $dress);
         $dress->save();

          return $dress;

        //return new DressesResources($dress);

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
