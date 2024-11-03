<?php


namespace App\Http\Controllers\dashboard\AddNewUser;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Officer;
use Illuminate\Support\Facades\Hash;

class AddKader
{

    public function index($request)
    {

        $data = $request->validate(
            [
                'username' => 'required|min:4|unique:users',
                'password' => 'required|confirmed|min:6|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
                'role' => 'required',
                'nik' => 'required|size:16|unique:officers',
                'name' => 'required',
                'posyandu' => 'required',
                'desa' => 'required',
                'kecamatan' => 'required',
                'tahun_menjadi' => 'required',
                'place_of_birth' => 'required',
                'date_of_birth' => 'required|date',
                'gender' => 'required',
                'address' => 'required',
                'position' => 'required',
                'last_educations' => 'required',
                'phone_number' => 'required|between:10,13|unique:officers'
            ],
            [
                'phone_number.between' => 'Nomor :attribute harus antara :min dan :max karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok dengan password yang dimasukkan.',
                'password.regex' => 'attribute harus mengandung setidaknya satu huruf besar dan satu angka.'
            ]
        );

        // dd($request);


        $officer = Officer::create([
            'nik' => $data['nik'],
            'name' => $data['name'],
            'posyandu' => $data['posyandu'],
            'desa' => $data['desa'],
            'kecamatan' => $data['kecamatan'],
            'tahun_menjadi' => $data['tahun_menjadi'],
            'place_of_birth' => $data['place_of_birth'],
            'date_of_birth' => Carbon::parse($data['date_of_birth'])->format('Y-m-d'),
            'gender' => $data['gender'],
            'address' => $data['address'],
            'position' => $data['position'],
            'last_educations' => $data['last_educations'],
            'phone_number' => $data['phone_number']
        ]);

        $user = User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'officer_id' => $officer->id
        ]);

        return redirect('officer-data')->with('success', 'Data Kader Berhasil Ditambahkan');
    }

    public function edit($request) {
        
    }
};
