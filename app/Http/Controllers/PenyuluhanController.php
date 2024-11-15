<?php

namespace App\Http\Controllers;

use App\Models\Penyuluhan;
use App\Http\Requests\StorePenyuluhanRequest;
use App\Http\Requests\UpdatePenyuluhanRequest;

class PenyuluhanController extends Controller
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
     * @param  \App\Http\Requests\StorePenyuluhanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenyuluhanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyuluhan  $penyuluhan
     * @return \Illuminate\Http\Response
     */
    public function show(Penyuluhan $penyuluhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyuluhan  $penyuluhan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyuluhan $penyuluhan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenyuluhanRequest  $request
     * @param  \App\Models\Penyuluhan  $penyuluhan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenyuluhanRequest $request, Penyuluhan $penyuluhan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyuluhan  $penyuluhan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyuluhan $penyuluhan)
    {
        //
    }
}
