<?php


namespace App\Http\Controllers\dashboard\AddNewUser;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Midwife;
use Illuminate\Support\Facades\Hash;

class AddBidan
{

    public function index($request)
    {

        $data = $request->validate(
            [
                'username' => 'required|min:4|unique:users',
                'password' => 'required|confirmed|min:6|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
                'role' => 'required',
                'nik' => 'required|size:16|unique:midwives',
                'name' => 'required',
                'nip' => 'required',
                'posyandu' => 'required',
                'place_of_birth' => 'required',
                'date_of_birth' => 'required|date',
                'gender' => 'required',
                'address' => 'required',
                'last_educations' => 'required',
                'phone_number' => 'required|between:10,13|unique:midwives'
            ],
            [
                'phone_number.between' => 'Nomor :attribute harus antara :min dan :max karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok dengan password yang dimasukkan.',
                'password.regex' => 'attribute harus mengandung setidaknya satu huruf besar dan satu angka.'
            ]
        );

        $bidan = Midwife::create([
            'nik' => $data['nik'],
            'nip' => $data['nip'],
            'name' => $data['name'],
            'posyandu' => $data['posyandu'],
            'place_of_birth' => $data['place_of_birth'],
            'date_of_birth' => Carbon::parse($data['date_of_birth'])->format('Y-m-d'),
            'gender' => $data['gender'],
            'address' => $data['address'],
            'last_educations' => $data['last_educations'],
            'phone_number' => $data['phone_number']
        ]);
        $user = User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'midwife_id' => $bidan->id
        ]);

        return redirect('tampil-user')->with('success', 'Data Bidan Berhasil Ditambahkan');
    }

    public function edit($request) {
        
    }
};
