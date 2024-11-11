<?php

namespace App\Http\Controllers\dashboard;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Officer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\dashboard\AddNewUser\AddKader;
use App\Http\Controllers\dashboard\AddNewUser\AddAdmin;
use App\Http\Controllers\dashboard\AddNewUser\AddBidan;
use App\Http\Controllers\dashboard\AddNewUser\AddKeluarga;
use App\Http\Controllers\dashboard\AddNewUser\AddKepalaDesa;
use App\Http\Controllers\dashboard\AddNewUser\AddPuskesmas;

class AddNewUserController extends Controller
{
    public function index()
    {
        // return view('content.dashboard.addNewUser');
    }
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

        $cekRole = $request->role;

        if ($cekRole === 'kader') {
            $officer = new AddKader();
            return $officer->index($request);
        }
        if ($cekRole === 'admin') {
            $admin = new AddAdmin();
            return $admin->index($request);
        }
        if ($cekRole === 'bidan') {
            $bidan = new AddBidan();
            return $bidan->index($request);
        }
        if ($cekRole === 'kepalaDesa') {
            $kepalaDesa = new AddKepalaDesa();
            return $kepalaDesa->index($request);
        }
        if ($cekRole === 'keluarga') {
            $keluarga = new AddKeluarga();
            return $keluarga->index($request);
        }
        if ($cekRole === 'puskesmas') {
            $bidan = new AddPuskesmas();
            return $bidan->index($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cekRole = $request->role;

        if ($cekRole === 'kader') {
            $officer = new AddKader();
            return $officer->edit($request, $id);
        }
        if ($cekRole === 'admin') {
            $admin = new AddAdmin();
            return $admin->edit($request, $id);
        }
        if ($cekRole === 'bidan') {
            $bidan = new AddBidan();
            return $bidan->edit($request, $id);
        }
        if ($cekRole === 'kepalaDesa') {
            $kepalaDesa = new AddKepalaDesa();
            return $kepalaDesa->edit($request, $id);
        }
        if ($cekRole === 'keluarga') {
            $keluarga = new AddKeluarga();
            return $keluarga->edit($request, $id);
        }
        if ($cekRole === 'puskesmas') {
            $bidan = new AddPuskesmas();
            return $bidan->edit($request, $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
