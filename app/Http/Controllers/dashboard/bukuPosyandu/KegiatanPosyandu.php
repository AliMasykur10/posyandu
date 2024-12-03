<?php

namespace App\Http\Controllers\dashboard\bukuPosyandu;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KegiatanPosyandu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kegiatan::all();

        return view('content.dashboard.buku-posyandu.kegiatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Create()
    {
        return view('content.dashboard.buku-posyandu.kegiatan.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Store(Request $request)
    {
        $data = $request->validate(
            [
                'kegiatan' => 'required',
                'tempat' => 'required',
                'penanggung_jawab' => 'required',
                'sumber_dana' => 'required',
                'keterangan' => 'required',
                'posyandu' => 'required',
            ]
        );

        $kegiatan = Kegiatan::create([
            'kegiatan' => $data['kegiatan'],
            'tempat' => $data['tempat'],
            'penanggung_jawab' => $data['penanggung_jawab'],
            'sumber_dana' => $data['sumber_dana'],
            'keterangan' => $data['keterangan'],
            'posyandu' => $data['posyandu'],
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'kegiatan Berhasil Ditambahkan');
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
        $data = Kegiatan::find($id);
        return view('content.dashboard.buku-posyandu.kegiatan.edit', compact('data'));
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
                'kegiatan' => 'sometimes',
                'tempat' => 'sometimes',
                'penanggung_jawab' => 'sometimes',
                'sumber_dana' => 'sometimes',
                'keterangan' => 'sometimes',
                'posyandu' => 'sometimes',
            ]
        );

        $kegiatan = Kegiatan::find($id);

        if ($kegiatan) {
            $kegiatan->update([
                'kegiatan' => $data['kegiatan'],
                'tempat' => $data['tempat'],
                'penanggung_jawab' => $data['penanggung_jawab'],
                'sumber_dana' => $data['sumber_dana'],
                'keterangan' => $data['keterangan'],
                'posyandu' => $data['posyandu'],
            ]);
            return redirect()->route('kegiatan.index')->with('success', 'Data berhasil diperbarui.');
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
        $kegiatan = Kegiatan::find($id);

        if ($kegiatan) {
            $kegiatan->delete();
            return redirect()->route('kegiatan.index')->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->route('kegiatan.index')->with('error', 'Data tidak ditemukan.');
    }
}
