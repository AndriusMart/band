<?php

namespace App\Http\Controllers;

use App\Models\dishImage;
use App\Http\Requests\StoredishImageRequest;
use App\Http\Requests\UpdatedishImageRequest;

class DishImageController extends Controller
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
     * @param  \App\Http\Requests\StoredishImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredishImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dishImage  $dishImage
     * @return \Illuminate\Http\Response
     */
    public function show(dishImage $dishImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dishImage  $dishImage
     * @return \Illuminate\Http\Response
     */
    public function edit(dishImage $dishImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedishImageRequest  $request
     * @param  \App\Models\dishImage  $dishImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedishImageRequest $request, dishImage $dishImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dishImage  $dishImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(dishImage $dishImage)
    {
        //
    }
}
