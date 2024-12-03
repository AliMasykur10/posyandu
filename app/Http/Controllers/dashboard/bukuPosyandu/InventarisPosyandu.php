<?php

namespace App\Http\Controllers\dashboard\bukuPosyandu;

use App\Models\inventaris;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InventarisPosyandu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = inventaris::all();
        return view('content.dashboard.buku-posyandu.inventaris.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.dashboard.buku-posyandu.inventaris.add');
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
                'nama_barang' => 'required',
                'tanggal_terima' => 'required',
                'asal' => 'required',
                'jumlah' => 'required',
                'keadaan' => 'required',
                'keterangan' => 'required',
                'posyandu' => 'required',
            ]
        );

        $inventaris = inventaris::create([
            'nama_barang' => $data['nama_barang'],
            'tanggal_terima' => $data['tanggal_terima'],
            'asal' => $data['asal'],
            'jumlah' => $data['jumlah'],
            'keadaan' => $data['keadaan'],
            'keterangan' => $data['keterangan'],
            'posyandu' => $data['posyandu'],
        ]);

        // dd($request);
        return redirect()->route('inventaris.index')->with('success', 'Tugas Berhasil Ditambahkan');
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
        $data = inventaris::find($id);
        return view('content.dashboard.buku-posyandu.inventaris.edit', compact('data'));
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
                'nama_barang' => 'sometimes',
                'tanggal_terima' => 'sometimes',
                'asal' => 'sometimes',
                'jumlah' => 'sometimes',
                'keadaan' => 'sometimes',
                'keterangan' => 'sometimes',
                'posyandu' => 'sometimes',
            ]
        );

        $inventaris = inventaris::find($id);

        if ($inventaris) {

            $inventaris->update([
                'nama_barang' => $data['nama_barang'],
                'tanggal_terima' => $data['tanggal_terima'],
                'asal' => $data['asal'],
                'jumlah' => $data['jumlah'],
                'keadaan' => $data['keadaan'],
                'keterangan' => $data['keterangan'],
                'posyandu' => $data['posyandu'],
            ]);
            return redirect()->route('inventaris.index')->with('success', 'Barang Berhasil Ditambahkan');
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
        $inventaris = inventaris::find($id);

        if ($inventaris) {
            $inventaris->delete();
            return redirect()->route('inventaris.index')->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->route('inventaris.index')->with('error', 'Data tidak ditemukan.');
    }
}
