<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use App\Http\Requests\StorePromocionRequest;
use App\Http\Requests\UpdatePromocionRequest;

class PromocionController extends Controller
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
     * @param  \App\Http\Requests\StorePromocionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromocionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function show(Promocion $promocion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promocion $promocion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePromocionRequest  $request
     * @param  \App\Models\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromocionRequest $request, Promocion $promocion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promocion $promocion)
    {
        //
    }
}
