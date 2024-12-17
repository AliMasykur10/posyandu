<?php

namespace App\Http\Controllers\dashboard\bukuPosyandu;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\PersediaanBahan as ModelsPersediaanBahan;

class PersediaanBahan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ModelsPersediaanBahan::all();
        return view('content.dashboard.buku-posyandu.persediaanBahan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.dashboard.buku-posyandu.persediaanBahan.add');
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
                'bulan' => 'required',
                'nama_barang' => 'required',
                'tanggal_terima' => 'required',
                'asal' => 'required',
                'jumlah' => 'required',
                'posyandu' => 'required',
            ]
        );

        $persediaan = ModelsPersediaanBahan::create([
            'bulan' => $data['bulan'],
            'nama_barang' => $data['nama_barang'],
            'tanggal_terima' => $data['tanggal_terima'],
            'asal' => $data['asal'],
            'jumlah' => $data['jumlah'],
            'posyandu' => $data['posyandu'],
        ]);

        // dd($request);
        return redirect()->route('persediaan-bahan.index')->with('success', 'Bahan Berhasil Ditambahkan');
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
        $data = ModelsPersediaanBahan::all($id);
        return view('content.dashboard.buku-posyandu.persediaanBahan.edit', compact('data'));
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
                'bulan' => 'sometimes',
                'nama_barang' => 'sometimes',
                'tanggal_terima' => 'sometimes',
                'asal' => 'sometimes',
                'jumlah' => 'sometimes',
                'posyandu' => 'sometimes',
            ]
        );

        $persediaan = ModelsPersediaanBahan::find($id);

        if ($persediaan) {

            $persediaan->update([
                'bulan' => $data['bulan'],
                'nama_barang' => $data['nama_barang'],
                'tanggal_terima' => $data['tanggal_terima'],
                'asal' => $data['asal'],
                'jumlah' => $data['jumlah'],
                'posyandu' => $data['posyandu'],
            ]);
            return redirect()->route('persediaan-bahan.index')->with('success', 'Bahan Berhasil Diupdate');
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
        $persediaan = ModelsPersediaanBahan::find($id);

        if ($persediaan) {
            $persediaan->delete();
            return redirect()->route('tugas-absensi.index')->with('success', 'Data Berhasil Dihapus');
        }
    }
}
