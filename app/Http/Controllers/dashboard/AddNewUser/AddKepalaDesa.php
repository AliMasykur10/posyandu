<?php


namespace App\Http\Controllers\dashboard\AddNewUser;

use App\Models\KepalaDesa;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AddKepalaDesa
{

    public function index($request)
    {

        $data = $request->validate(
            [
                'username' => 'required|min:4|unique:users',
                'password' => 'required|confirmed|min:6|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
                'role' => 'required',
                'nik' => 'required|size:16|unique:kepala_desas',
                'name' => 'required',
                'place_of_birth' => 'required',
                'date_of_birth' => 'required|date',
                'gender' => 'required',
                'address' => 'required',
                'last_educations' => 'required',
            ],
            [
                'password.confirmed' => 'Konfirmasi password tidak cocok dengan password yang dimasukkan.',
                'password.regex' => 'attribute harus mengandung setidaknya satu huruf besar dan satu angka.'
            ]
        );

        $kepalaDesa = KepalaDesa::create([
            'nik' => $data['nik'],
            'name' => $data['name'],
            'place_of_birth' => $data['place_of_birth'],
            'date_of_birth' => Carbon::parse($data['date_of_birth'])->format('Y-m-d'),
            'gender' => $data['gender'],
            'address' => $data['address'],
            'last_educations' => $data['last_educations'],
        ]);
        $user = User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'kepalaDesa_id' => $kepalaDesa->id
        ]);

        return redirect('tampil-user')->with('success', 'Data Kepala Desa Berhasil Ditambahkan');
    }

    public function edit($request, $id)
    {

        $user = User::find($id);
        $kepalaDesa_id = $user->kepalaDesa_id;

        $data = $request->validate(
            [
                'username' => 'sometimes|min:4|unique:users,username,' . $id,
                'nik' => 'sometimes|size:16|unique:kepala_desas,nik,' . $kepalaDesa_id,
                'name' => 'sometimes',
                'place_of_birth' => 'sometimes',
                'date_of_birth' => 'sometimes|date',
                'gender' => 'sometimes',
                'address' => 'sometimes',
                'last_educations' => 'sometimes',
            ]
        );

        $user->update([
            'username' => $data['username'],
        ]);


        $kepalaDesa = KepalaDesa::find($kepalaDesa_id);
        $kepalaDesa->update([
            'nik' => $data['nik'],
            'name' => $data['name'],
            'place_of_birth' => $data['place_of_birth'],
            'date_of_birth' => Carbon::parse($data['date_of_birth'])->format('Y-m-d'),
            'gender' => $data['gender'],
            'address' => $data['address'],
            'last_educations' => $data['last_educations'],
        ]);


        return redirect('tampil-user')->with('success', 'Data Kepala Desa Berhasil Diubah');
    }
};
