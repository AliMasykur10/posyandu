<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TampilUser extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $user = User::when($search, function ($query, $search) {
            return $query->where('username', 'like', '%' . $search . '%')->orWhere('role', 'like', '%' . $search . '%');
        })->paginate(3);

        return view('content.dashboard.tampilUser', compact('user'));
    }

    public function edit($id)
    {

        $role = User::find($id)->role;
        $data = User::find($id);


        if ($role === 'admin') {
            return view('content.dashboard.addUserComp.admin.edit',  ['id' => $id, 'data' => $data]);
        } elseif ($role === 'kader') {
            return view('content.dashboard.addUserComp.kader.edit',  ['id' => $id, 'data' => $data]);
        } elseif ($role === 'bidan') {
            return view('content.dashboard.addUserComp.bidan.edit',  ['id' => $id, 'data' => $data]);
        } elseif ($role === 'kepalaDesa') {
            return view('content.dashboard.addUserComp.kepalaDesa.edit', ['id' => $id, 'data' => $data]);
        } elseif ($role === 'keluarga') {
            return view('content.dashboard.addUserComp.keluarga.edit',  ['id' => $id, 'data' => $data]);
        } elseif ($role === 'puskesmas') {
            return view('content.dashboard.addUserComp.puskesmas.edit', ['id' => $id, 'data' => $data]);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->family) {
            $user->family->delete();
        } elseif ($user->kades) {
            $user->kades->delete();
        } elseif ($user->puskesmas) {
            $user->puskesmas->delete();
        } elseif ($user->officer) {
            $user->officer->delete();
        } elseif ($user->midwife) {
            $user->midwife->delete();
        }
        $user->delete();
        return redirect('/tampil-user')->with('success', 'user Berhasil Dihapus');
    }
}
