<?php

namespace App\Http\Controllers;

use App\Models\Website\ReviewController;
use Illuminate\Http\Request;

class ReviewControllerController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $review = ReviewController::create([
            'comment'=> $request->input('comment'),
            'user_id'=> auth()->user()->id,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website\ReviewController  $reviewController
     * @return \Illuminate\Http\Response
     */
    public function show(ReviewController $reviewController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website\ReviewController  $reviewController
     * @return \Illuminate\Http\Response
     */
    public function edit(ReviewController $reviewController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website\ReviewController  $reviewController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReviewController $reviewController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website\ReviewController  $reviewController
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReviewController $reviewController)
    {
        //
    }
}
