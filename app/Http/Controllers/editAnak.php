<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class editAnak extends Controller
{
    public function edit($id)
    {
        $data = Child::find($id);

        return view('content.dashboard.addUserComp.keluarga.editAnak',  ['id' => $id, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {

        $child = Child::find($id);
        $data = $request->validate([
            'nik' => 'sometimes|size:16|unique:children,nik,' . $id,
            'name' => 'sometimes',
            'place_of_birth' => 'sometimes',
            'date_of_birth' => 'sometimes|date',
            'gender' => 'sometimes',
            'golongan_darah' => 'sometimes',
        ]);

        // dd($request);
        $child->update([
            'nik' => $data['nik'],
            'name' => $data['name'],
            'place_of_birth' => $data['place_of_birth'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'golongan_darah' => $data['golongan_darah'],
        ]);

        return redirect('children-data')->with('success', 'Data Anak Berhasil Diubah');
    }
}
