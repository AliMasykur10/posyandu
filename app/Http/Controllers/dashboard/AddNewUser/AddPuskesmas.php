<?php


namespace App\Http\Controllers\dashboard\AddNewUser;

use App\Models\Puskesmas;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AddPuskesmas
{

    public function index($request)
    {

        // dd($request);

        $data = $request->validate(
            [
                'username' => 'required|min:4|unique:users',
                'password' => 'required|confirmed|min:6|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
                'role' => 'required',
                'name' => 'required',
                'address' => 'required',
            ],
            [
                'password.confirmed' => 'Konfirmasi password tidak cocok dengan password yang dimasukkan.',
                'password.regex' => 'attribute harus mengandung setidaknya satu huruf besar dan satu angka.'
            ]
        );


        $puskesmas = Puskesmas::create([
            'name' => $data['name'],
            'address' => $data['address'],
        ]);
        $user = User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'puskesmas_id' => $puskesmas->id
        ]);

        return redirect('tampil-user')->with('success', 'Data Puskesmas Berhasil Ditambahkan');
    }

    public function edit($request, $id)
    {

        // dd($id);


        $data = $request->validate(
            [
                'username' => 'sometimes|min:4|unique:users,username,' . $id,
                'name' => 'sometimes',
                'address' => 'sometimes',
            ]
        );


        $user = User::find($id);
        $user->update([
            'username' => $data['username'],
        ]);

        $puskesmas_id = $user->puskesmas_id;

        $puskesmas = Puskesmas::find($puskesmas_id);
        $puskesmas->update([
            'name' => $data['name'],
            'address' => $data['address']

        ]);

        return redirect()->route('tampil-user.index')->with('success', 'Data Puskesmas Berhasil Diubah');
    }
};
