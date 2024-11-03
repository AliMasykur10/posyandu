<?php


namespace App\Http\Controllers\dashboard\AddNewUser;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AddAdmin
{

    public function index($request)
    {


        $data = $request->validate(
            [
                'username' => 'required|min:4|unique:users',
                'name' => 'required|min:4',
                'password' => 'required|confirmed|min:6|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
                'role' => 'required'
            ]
        );



        $user = User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);


        return redirect()->route('tambah-user.index')->with('success', 'Data Admin Berhasil Ditambahkan');
    }

    public function edit($request, $id)
    {
        $data = $request->validate(
            [
                'username' => 'sometimes|min:4|unique:users',
                'name' => 'sometimes|min:4',
            ]
        );


        $user = User::find($id);

        $user->update([
            'username' => $data['username'],
            'name' => $data['name'],
        ]);


        return redirect()->route('tampil-user.index')->with('success', 'Data Admin Berhasil Ditambahkan');
    }
};
