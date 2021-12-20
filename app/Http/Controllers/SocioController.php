<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use App\Http\Requests\StoreSocioRequest;
use App\Http\Requests\UpdateSocioRequest;

class SocioController extends Controller
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
     * @param  \App\Http\Requests\StoreSocioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function show(Socio $socio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function edit(Socio $socio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSocioRequest  $request
     * @param  \App\Models\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSocioRequest $request, Socio $socio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socio $socio)
    {
        //
    }
}
