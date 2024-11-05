<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class editAnak extends Controller
{
    public function edit($id)
    {
        $data = User::find($id);


        return view('content.dashboard.addUserComp.keluarga.editAnak',  ['id' => $id, 'data' => $data]);
    }
}
