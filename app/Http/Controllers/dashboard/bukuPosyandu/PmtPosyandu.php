<?php

namespace App\Http\Controllers\dashboard\bukuPosyandu;

use App\Models\Pmt;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PmtPosyandu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Pmt::all();
        return view('content.dashboard.buku-posyandu.pmt.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.dashboard.buku-posyandu.pmt.add');
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
                'menu' => 'required',
                'biaya' => 'required',
                'sasaran' => 'required',
                'status' => 'required',
                'keterangan' => 'required',
                'posyandu' => 'required',
            ]
        );

        $tugas = Pmt::create([
            'tanggal' => $data['tanggal'],
            'menu' => $data['menu'],
            'biaya' => $data['biaya'],
            'sasaran' => $data['sasaran'],
            'status' => $data['status'],
            'keterangan' => $data['keterangan'],
            'posyandu' => $data['posyandu']
        ]);

        // dd($request);
        return redirect()->route('pmt.index')->with('success', 'PMT Berhasil Ditambahkan');
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
        $data = Pmt::find($id);
        return view('content.dashboard.buku-posyandu.pmt.edit', compact('data'));
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
                'menu' => 'sometimes',
                'biaya' => 'sometimes',
                'sasaran' => 'sometimes',
                'status' => 'sometimes',
                'keterangan' => 'sometimes',
                'posyandu' => 'sometimes',
            ]
        );

        $pmt = Pmt::find($id);
        if ($pmt) {
            $pmt->update([
                'tanggal' => $data['tanggal'],
                'menu' => $data['menu'],
                'biaya' => $data['biaya'],
                'sasaran' => $data['sasaran'],
                'status' => $data['status'],
                'keterangan' => $data['keterangan'],
                'posyandu' => $data['posyandu']
            ]);
            return redirect()->route('pmt.index')->with('success', 'PMT Berhasil Diubah');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }


        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pmt = Pmt::find($id);

        if ($pmt) {
            $pmt->delete();
            return redirect()->route('pmt.index')->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->route('pmt.index')->with('error', 'Data tidak ditemukan.');
    }
}
