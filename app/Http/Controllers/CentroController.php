<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Http\Requests\StoreCentroRequest;
use App\Http\Requests\UpdateCentroRequest;

class CentroController extends Controller
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
     * @param  \App\Http\Requests\StoreCentroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCentroRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function show(Centro $centro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function edit(Centro $centro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCentroRequest  $request
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCentroRequest $request, Centro $centro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Centro $centro)
    {
        //
    }
}
