<?php

namespace App\Http\Controllers\dashboard\bukuPosyandu;

use App\Models\TugasAbsensi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TugasAbsensiPosyandu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = TugasAbsensi::all();
        return view('content.dashboard.buku-posyandu.tugasAbsensi.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.dashboard.buku-posyandu.tugasAbsensi.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tanggal' => 'required',
                'nama' => 'required',
                'tempat' => 'required',
                'keterangan' => 'required',
                'posyandu' => 'required',
            ]
        );

        $tugas = TugasAbsensi::create([
            'tanggal' => $data['tanggal'],
            'nama' => $data['nama'],
            'tempat' => $data['tempat'],
            'keterangan' => $data['keterangan'],
            'posyandu' => $data['posyandu'],
        ]);

        // dd($request);
        return redirect()->route('tugas-absensi.index')->with('success', 'Tugas Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TugasAbsensi::find($id);
        return view('content.dashboard.buku-posyandu.tugasAbsensi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'tanggal' => 'sometimes',
                'nama' => 'sometimes',
                'tempat' => 'sometimes',
                'keterangan' => 'sometimes',
                'posyandu' => 'sometimes',
            ]
        );

        $tugas = TugasAbsensi::find($id);

        if ($tugas) {
            $tugas->update([
                'tanggal' => $data['tanggal'],
                'nama' => $data['nama'],
                'tempat' => $data['tempat'],
                'keterangan' => $data['keterangan'],
                'posyandu' => $data['posyandu'],
            ]);
            return redirect()->route('tugas-absensi.index')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $tugas = TugasAbsensi::find($id);

        if ($tugas) {
            $tugas->delete();
            return redirect()->route('tugas-absensi.index')->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->route('tugas-absensi.index')->with('error', 'Data tidak ditemukan.');
    }
}
