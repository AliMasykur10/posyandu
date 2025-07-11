<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Child;
use App\Models\family;
use App\Models\Midwife;
use App\Models\Officer;
use App\Models\Vaccine;
use App\Models\Vitamin;
use App\Models\Posyandu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // public function run()
    // {

    //     family::create([
    //         'nkk' => '1234567890123489',
    //         'nik_ibu' => '1234567890123456',
    //         'nama_ibu' => 'Nagita Slavina',
    //         'date_of_birth_ibu' => '1990-01-01',
    //         'place_of_birth_ibu' => 'Jakarta',
    //         'golongan_darah_ibu' => 'A',
    //         'nik_ayah' => '1234567890123457',
    //         'nama_ayah' => 'Raffi Ahmad',
    //         'date_of_birth_ayah' => '1980-01-01',
    //         'place_of_birth_ayah' => 'Jakarta',
    //         'golongan_darah_ayah' => 'B',
    //         'address' => 'Alamat Keluarga',
    //         'kecamatan' => 'Paiton',
    //         'desa' => 'Jabung Sisir',
    //         'posyandu' => 'anggrek',
    //         'phone_number' => '1234567890',
    //     ]);

    //     Child::create([
    //         'nik' => '1234567890123457',
    //         'name' => 'rafathar',
    //         'place_of_birth' => 'Tempat Lahir Anak',
    //         'date_of_birth' => '2020-01-01',
    //         'gender' => 'L',
    //         'golongan_darah' => 'O',
    //         'family_id' => 1, // Sesuaikan dengan id keluarga yang telah dibuat
    //     ]);

    //     Child::create([
    //         'nik' => '1234567890123458',
    //         'name' => 'Cipung',
    //         'place_of_birth' => 'Tempat Lahir Anak',
    //         'date_of_birth' => '2022-01-01',
    //         'gender' => 'L',
    //         'golongan_darah' => 'A',
    //         'family_id' => 1, // Sesuaikan dengan id keluarga yang telah dibuat
    //     ]);

    //     User::create([
    //         'username' => 'parent123',
    //         'password' => bcrypt('123123'),
    //         'family_id' => 1,
    //         'role' => 'keluarga'
    //     ]);

    //     User::create([
    //         'username' => 'admin123',
    //         'password' => bcrypt('123123'),
    //         'role' => 'admin'
    //     ]);


    //     Officer::create([
    //         'name' => 'Ana Fitriah N.',
    //         'nik' => '1234567890123456',
    //         'posyandu' => 'anggrek',
    //         'place_of_birth' => 'Probolinggo',
    //         'date_of_birth' => '1994-12-08',
    //         'gender' => 'Perempuan',
    //         'address' => 'Jabung Sisir',
    //         'position' => 'Anggota',
    //         'last_educations' => '-',
    //         'phone_number' => '1234567891',
    //         'desa' => 'Jabung Sisir',
    //         'kecamatan' => 'Paiton',
    //         'tahun_Menjadi' => '2016',
    //     ]);

    //     User::create([
    //         'username' => 'officer123',
    //         'password' => bcrypt('123123'),
    //         'officer_id' => 1,
    //         'role' => 'kader'
    //     ]);

    //     Midwife::create([
    //         'nik' => '1234567890123463',
    //         'nip' => '98765',
    //         'name' => 'Bidan Kedua',
    //         'posyandu' => 'anggrek',
    //         'place_of_birth' => 'Tempat Lahir Bidan',
    //         'date_of_birth' => '1987-06-25',
    //         'gender' => 'Perempuan',
    //         'address' => 'Alamat Bidan',
    //         'last_educations' => 'D3 Kebidanan',
    //         'phone_number' => '1234567895',
    //     ]);


    //     User::create([
    //         'username' => 'midwife123',
    //         'password' => bcrypt('123123'),
    //         'midwife_id' => 1,
    //         'role' => 'bidan'
    //     ]);

    //     // Vaccine::create([
    //     //     'vaccine_name' => 'Vaksin B',
    //     //     'stock' => '80',
    //     //     'for_age_value' => 1,
    //     //     'for_age_operator' => '=',
    //     //     'for_age_unit' => 'tahun',
    //     // ]);

    //     // Vaccine::create([
    //     //     'vaccine_name' => 'Vaksin C',
    //     //     'stock' => '120',
    //     //     'for_age_value' => 2,
    //     //     'for_age_operator' => '<',
    //     //     'for_age_unit' => 'tahun',
    //     // ]);

    //     // Vitamin::create([
    //     //     'vitamins_name' => 'Merah',
    //     //     'stock' => '30',
    //     // ]);

    //     // Vitamin::create([
    //     //     'vitamins_name' => 'Biru',
    //     //     'stock' => '40',
    //     // ]);

    //     Posyandu::create([
    //         'posyandu' => 'anggrek'
    //     ]);
    //     Posyandu::create([
    //         'posyandu' => 'mawar'
    //     ]);
    //     Posyandu::create([
    //         'posyandu' => 'kenanga'
    //     ]);
    //     Posyandu::create([
    //         'posyandu' => 'teratai'
    //     ]);
    //     Posyandu::create([
    //         'posyandu' => 'cempaka'
    //     ]);
    // }
    public function run(): void
    {
        $families = [
            [
                'id' => 1,
                'nkk' => '1234567890123489',
                'nik_ibu' => '1234567890123456',
                'nama_ibu' => 'Nagita Slavina',
                'date_of_birth_ibu' => '1990-01-01',
                'place_of_birth_ibu' => 'Jakarta',
                'golongan_darah_ibu' => 'A',
                'nik_ayah' => '1234567890123457',
                'nama_ayah' => 'Raffi Ahmad',
                'date_of_birth_ayah' => '1980-01-01',
                'place_of_birth_ayah' => 'Jakarta',
                'golongan_darah_ayah' => 'B',
                'address' => 'Jabung Sisir',
                'kecamatan' => 'Paiton',
                'desa' => 'Jabung Sisir',
                'posyandu' => 'anggrek',
                'phone_number' => '081234567891',
                'child' => [
                    [
                        'nik' => '1234567890123457',
                        'name' => 'Rafathar',
                        'place_of_birth' => 'Jakarta',
                        'date_of_birth' => '2020-01-01',
                        'gender' => 'L',
                        'golongan_darah' => 'O'
                    ],
                    [
                        'nik' => '1234567890123458',
                        'name' => 'Cipung',
                        'place_of_birth' => 'Jakarta',
                        'date_of_birth' => '2022-01-01',
                        'gender' => 'L',
                        'golongan_darah' => 'A'
                    ]
                ],
                'users' => [
                    'username' => 'parent123',
                    'password' => '123123',
                    'role' => 'keluarga'
                ]
            ],
            [
                'id' => 2,
                'nkk' => '1234567890123490',
                'nik_ibu' => '1234567890123460',
                'nama_ibu' => 'Ayu Dewi',
                'date_of_birth_ibu' => '1991-02-01',
                'place_of_birth_ibu' => 'Surabaya',
                'golongan_darah_ibu' => 'O',
                'nik_ayah' => '1234567890123461',
                'nama_ayah' => 'Regi Datau',
                'date_of_birth_ayah' => '1981-02-01',
                'place_of_birth_ayah' => 'Surabaya',
                'golongan_darah_ayah' => 'A',
                'address' => 'Jl. Posyandu 2',
                'kecamatan' => 'Paiton',
                'desa' => 'Jabung Sisir',
                'posyandu' => 'anggrek',
                'phone_number' => '081234567892',
                'child' => [
                    [
                        'nik' => '1234567890123462',
                        'name' => 'Bilqis',
                        'place_of_birth' => 'Surabaya',
                        'date_of_birth' => '2021-06-01',
                        'gender' => 'P',
                        'golongan_darah' => 'B'
                    ]
                ],
                'users' => [
                    'username' => 'parent456',
                    'password' => '123123',
                    'role' => 'keluarga'
                ]
            ]
        ];

        foreach ($families as $familyData) {
            $children = $familyData['child'];
            $user = $familyData['users'];

            unset($familyData['child'], $familyData['users']);

            $family = Family::create($familyData);

            foreach ($children as $childData) {
                Child::create(array_merge($childData, ['family_id' => $family->id]));
            }

            User::create([
                'username' => $user['username'],
                'password' => bcrypt($user['password']),
                'family_id' => $family->id,
                'role' => $user['role'],
            ]);
        }

        // ---------- USER ADMIN ----------
        User::create([
            'username' => 'admin123',
            'password' => bcrypt('123123'),
            'role' => 'admin'
        ]);

        // ---------- OFFICER + USER (kader) ----------
        $officer = Officer::create([
            'name' => 'Ana Fitriah N.',
            'nik' => '1234567890123456',
            'posyandu' => 'anggrek',
            'place_of_birth' => 'Probolinggo',
            'date_of_birth' => '1994-12-08',
            'gender' => 'Perempuan',
            'address' => 'Jabung Sisir',
            'position' => 'Anggota',
            'last_educations' => 'SMA',
            'phone_number' => '081234567893',
            'desa' => 'Jabung Sisir',
            'kecamatan' => 'Paiton',
            'tahun_Menjadi' => '2016',
        ]);

        User::create([
            'username' => 'officer123',
            'password' => bcrypt('123123'),
            'officer_id' => $officer->id,
            'role' => 'kader'
        ]);

        // ---------- BIDAN + USER (bidan) ----------
        $midwife = Midwife::create([
            'nik' => '1234567890123463',
            'nip' => '98765',
            'name' => 'Bidan Kedua',
            'posyandu' => 'anggrek',
            'place_of_birth' => 'Tempat Lahir Bidan',
            'date_of_birth' => '1987-06-25',
            'gender' => 'Perempuan',
            'address' => 'Alamat Bidan',
            'last_educations' => 'D3 Kebidanan',
            'phone_number' => '081234567894',
        ]);

        User::create([
            'username' => 'midwife123',
            'password' => bcrypt('123123'),
            'midwife_id' => $midwife->id,
            'role' => 'bidan'
        ]);
    }
}
