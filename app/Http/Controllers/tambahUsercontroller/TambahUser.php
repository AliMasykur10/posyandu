<?php

namespace App\Http\Controllers\tambahUserController;

use Illuminate\Routing\Controller;

class TambahUser extends Controller
{


    public function admin()
    {
        return view('content.dashboard.addUserComp.admin.index', ['jenisUser' => 'admin']);
    }
    public function kader()
    {
        return view('content.dashboard.addUserComp.kader.index', ['jenisUser' => 'kader']);
    }
    public function keluarga()
    {
        return view('content.dashboard.addUserComp.keluarga.index', ['jenisUser' => 'keluarga']);
    }
    public function puskesmas()
    {
        return view('content.dashboard.addUserComp.puskesmas.index', ['jenisUser' => 'puskesmas']);
    }
    public function kepalaDesa()
    {
        return view('content.dashboard.addUserComp.kepalaDesa.index', ['jenisUser' => 'kepalaDesa']);
    }
    public function bidan()
    {
        return view('content.dashboard.addUserComp.bidan.index', ['jenisUser' => 'bidan']);
    }
}
