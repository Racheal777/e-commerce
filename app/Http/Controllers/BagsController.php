<?php

namespace App\Http\Controllers;

use App\Http\Resources\BagssResource;
use App\Models\Bags;
use App\Traits\DetailsEntryTrait;
use App\Traits\ReviewTrait;
use Illuminate\Http\Request;

class BagsController extends Controller
{
    use DetailsEntryTrait;
    use ReviewTrait;
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
    public function store(Request $request, Bags $bags)
    {
        //add a bag
        $bags = new Bags();
        $bags = $this->detailsEntry($request, $bags);

        $bags->save();

        return new BagssResource($bags);

    }

    public function addBagsReview(Request $request, Bags $bag)
    {
        
      //saving the review to the dress model coming from the treit
        $review = $this->addReview($request, $bag);
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
