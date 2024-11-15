<?php

namespace App\Http\Controllers;

use App\Models\PusWus;
use App\Http\Requests\StorePusWusRequest;
use App\Http\Requests\UpdatePusWusRequest;

class PusWusController extends Controller
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
     * @param  \App\Http\Requests\StorePusWusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePusWusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PusWus  $pusWus
     * @return \Illuminate\Http\Response
     */
    public function show(PusWus $pusWus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PusWus  $pusWus
     * @return \Illuminate\Http\Response
     */
    public function edit(PusWus $pusWus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePusWusRequest  $request
     * @param  \App\Models\PusWus  $pusWus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePusWusRequest $request, PusWus $pusWus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PusWus  $pusWus
     * @return \Illuminate\Http\Response
     */
    public function destroy(PusWus $pusWus)
    {
        //
    }
}
