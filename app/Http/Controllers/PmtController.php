<?php

namespace App\Http\Controllers;

use App\Models\Pmt;
use App\Http\Requests\StorePmtRequest;
use App\Http\Requests\UpdatePmtRequest;

class PmtController extends Controller
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
     * @param  \App\Http\Requests\StorePmtRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePmtRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pmt  $pmt
     * @return \Illuminate\Http\Response
     */
    public function show(Pmt $pmt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pmt  $pmt
     * @return \Illuminate\Http\Response
     */
    public function edit(Pmt $pmt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePmtRequest  $request
     * @param  \App\Models\Pmt  $pmt
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePmtRequest $request, Pmt $pmt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pmt  $pmt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pmt $pmt)
    {
        //
    }
}
