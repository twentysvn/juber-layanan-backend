<?php

namespace App\Http\Controllers;

use App\Models\FoodishProduct;
use Illuminate\Http\Request;

class FoodishProductController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodishProduct  $foodishProduct
     * @return \Illuminate\Http\Response
     */
    public function show(FoodishProduct $foodishProduct)
    {
        //
    }

    public function byidrs($idrs)
    {
        # code...
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodishProduct  $foodishProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodishProduct $foodishProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodishProduct  $foodishProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodishProduct $foodishProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodishProduct  $foodishProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodishProduct $foodishProduct)
    {
        //
    }
}
