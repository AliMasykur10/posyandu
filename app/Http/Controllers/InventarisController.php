<?php

namespace App\Http\Controllers;

use App\Models\inventaris;
use App\Http\Requests\StoreinventarisRequest;
use App\Http\Requests\UpdateinventarisRequest;

class InventarisController extends Controller
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
     * @param  \App\Http\Requests\StoreinventarisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreinventarisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(inventaris $inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(inventaris $inventaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateinventarisRequest  $request
     * @param  \App\Models\inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateinventarisRequest $request, inventaris $inventaris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventaris $inventaris)
    {
        //
    }
}
