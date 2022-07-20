<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewCollection;
use App\Models\Shoes;
use App\Models\Dresses;
use App\Models\Reviews;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewssResource;
use App\Models\Bags;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Reviews::all();

        return new ReviewCollection($reviews);
        // $reviews = Reviews::find(1);
        // return $reviews->reviewable;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $newName = Dresses::find($id);
        $shoe = Shoes::find($id);
        $bag = Bags::find($id);
        $dress = Dresses::find($id);



        if ($request->identifier == 'shoes') {
            $newName = $shoe;

        }else if($request->identifier == 'bags') {
            $newName = $bag;

        }else if($request->identifier == 'dress') {
            $newName = $dress;

        }

        $review = new Reviews();
        $review->message = $request->input('message');
        $review->ratings = $request->input('ratings');
        $review->user_id = $request->input('user_id');

        $newName->reviews()->save($review);

        return new ReviewssResource($review);

       

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
