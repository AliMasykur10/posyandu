<?php


namespace App\Http\Controllers\dashboard\AddNewUser;

use App\Models\Child;
use App\Models\family;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AddKeluarga
{

    public function index($request)
    {


        $data = $request->validate(
            [
                'username' => 'required|min:4|unique:users',
                'password' => 'required|confirmed|min:6|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
                'role' => 'required',
                'nik_ibu' => 'required|size:16|unique:families',
                'nama_ibu' => 'required',
                'date_of_birth_ibu' => 'required|date',
                'place_of_birth_ibu' => 'required',
                'golongan_darah_ibu' => 'required',
                'nik_ayah' => 'required|size:16|unique:families',
                'nama_ayah' => 'required',
                'date_of_birth_ayah' => 'required|date',
                'place_of_birth_ayah' => 'required',
                'golongan_darah_ayah' => 'required',
                'nik_anak' => 'required|size:16|unique:children,nik',
                'nama_anak' => 'required',
                'date_of_birth_anak' => 'required|date',
                'place_of_birth_anak' => 'required',
                'gender_anak' => 'required',
                'golongan_darah_anak' => 'required',
                'address' => 'required',
                'kecamatan' => 'required',
                'desa' => 'required',
                'posyandu' => 'required',
                'phone_number' => 'required|between:10,13|unique:families',
            ],
            [
                'phone_number.between' => 'Nomor :attribute harus antara :min dan :max karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok dengan password yang dimasukkan.',
                'password.regex' => 'attribute harus mengandung setidaknya satu huruf besar dan satu angka.'
            ]
        );

        // dd($data);


        $orangTua = family::create([
            'nik_ibu' => $data['nik_ibu'],
            'nama_ibu' => $data['nama_ibu'],
            'date_of_birth_ibu' => $data['date_of_birth_ibu'],
            'place_of_birth_ibu' => $data['place_of_birth_ibu'],
            'golongan_darah_ibu' => $data['golongan_darah_ibu'],
            'nik_ayah' => $data['nik_ayah'],
            'nama_ayah' => $data['nama_ayah'],
            'date_of_birth_ayah' => $data['date_of_birth_ayah'],
            'place_of_birth_ayah' => $data['place_of_birth_ayah'],
            'golongan_darah_ayah' => $data['golongan_darah_ayah'],
            'address' => $data['address'],
            'kecamatan' => $data['kecamatan'],
            'desa' => $data['desa'],
            'posyandu' => $data['posyandu'],
            'phone_number' => $data['phone_number']
        ]);

        $anak = Child::create([
            'nik' => $data['nik_anak'],
            'name' => $data['nama_anak'],
            'date_of_birth' => $data['date_of_birth_anak'],
            'place_of_birth' => $data['place_of_birth_anak'],
            'golongan_darah' => $data['golongan_darah_anak'],
            'gender' => $data['gender_anak'],
            'family_id' => $orangTua->id
        ]);

        $user = User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'family_id' => $orangTua->id
        ]);

        return redirect('parent-data')->with('success', 'Data Keluarga Berhasil ditambah');
    }

    public function edit($request, $id)
    {

        $data = $request->validate(
            [
                'username' => 'sometimes|min:4|unique:users,username,' . $id,
                'nik_ibu' => 'sometimes|size:16|unique:families,nik_ibu,' . $id,
                'nama_ibu' => 'sometimes',
                'date_of_birth_ibu' => 'sometimes|date',
                'place_of_birth_ibu' => 'sometimes',
                'golongan_darah_ibu' => 'sometimes',
                'nik_ayah' => 'sometimes|size:16|unique:families,nik_ayah,' . $id,
                'nama_ayah' => 'sometimes',
                'date_of_birth_ayah' => 'sometimes|date',
                'place_of_birth_ayah' => 'sometimes',
                'golongan_darah_ayah' => 'sometimes',
                'address' => 'sometimes',
                'kecamatan' => 'sometimes',
                'desa' => 'sometimes',
                'phone_number' => 'sometimes|between:10,13|unique:families,phone_number,' . $id,
            ],
            [
                'phone_number.between' => 'Nomor :attribute harus antara :min dan :max karakter.',
            ]
        );

        $user = User::find($id);
        $user->update([
            'username' => $data['username'],
        ]);

        $orangTua_id = $user->family_id;
        $orangTua = family::find($orangTua_id);

        $orangTua->update([
            'nik_ibu' => $data['nik_ibu'],
            'nama_ibu' => $data['nama_ibu'],
            'date_of_birth_ibu' => $data['date_of_birth_ibu'],
            'place_of_birth_ibu' => $data['place_of_birth_ibu'],
            'golongan_darah_ibu' => $data['golongan_darah_ibu'],
            'nik_ayah' => $data['nik_ayah'],
            'nama_ayah' => $data['nama_ayah'],
            'date_of_birth_ayah' => $data['date_of_birth_ayah'],
            'place_of_birth_ayah' => $data['place_of_birth_ayah'],
            'golongan_darah_ayah' => $data['golongan_darah_ayah'],
            'address' => $data['address'],
            'kecamatan' => $data['kecamatan'],
            'desa' => $data['desa'],
            'phone_number' => $data['phone_number']
        ]);



        return redirect('parent-data')->with('success', 'Data Keluarga Berhasil diubah');
    }
};
