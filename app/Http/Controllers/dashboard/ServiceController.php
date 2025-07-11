<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Child;
use App\Models\Vaccine;
use App\Models\Vitamin;
use App\Models\Weighing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Immunization;

class ServiceController extends Controller
{
    public function WeighingChild()
    {
        $children = Child::with('parent')->get();
        return view('content.dashboard.service.WeighingChild.index', compact('children'));
    }

    public function StoreWeighing(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'child_id' => 'required',
            'weigh_date' => 'required|date',
            'age' => 'required',
            'body_weight' => 'required',
            'height' => 'required',
            'in_accordance' => [
                'required',
                Rule::in(['Y', 'T']),
            ],
            'information' => 'nullable'
        ]);

        Weighing::create($data);

        return redirect('DataWeighing')->with('success', 'Anda Berhasil Mengirimkan Data');
    }

    public function ImmunizationChild()
    {
        $children = Child::with('parent')->get();
        $vaccine = Vaccine::all();
        $vitamins = Vitamin::all();
        return view('content.dashboard.service.immunizationChild.index', compact('children', 'vaccine', 'vitamins'));
    }

    public function ImmunizationStore(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'child_id' => 'required',
            'age' => 'required',
            'immunization_date' => 'date|required',
            'condition' => [
                'required',
                Rule::in(['Y', 'T'])
            ],
            'vaccine_id' => 'nullable',
            'vitamins_id' => 'nullable',
            'information' => 'nullable'
        ]);

        $vaccineId = 'vaccine_id';
        $vitaminsId = 'vitamins_id';

        $vaccine = isset($data[$vaccineId]) && $data[$vaccineId] ? optional(Vaccine::find($data[$vaccineId]))->first() : null;
        $vitamins = isset($data[$vitaminsId]) && $data[$vitaminsId] ? optional(Vitamin::find($data[$vitaminsId]))->first() : null;

        if (($vaccine && $vaccine->stock <= 0) && ($vitamins && $vitamins->stock <= 0)) {
            return redirect()->back()->with('error', 'Stok Vaksin dan Vitamin Habis');
        }

        if ($vaccine && $vaccine->stock <= 0) {
            return redirect()->back()->with('error', 'Stok Vaksin Habis');
        }

        if ($vitamins && $vitamins->stock <= 0) {
            return redirect()->back()->with('error', 'Stok Vitamin Habis');
        }

        if ($vaccine) {
            $vaccine->stock--;
            $vaccine->save();
        }

        if ($vitamins) {
            $vitamins->stock--;
            $vitamins->save();
        }

        Immunization::create($data);

        return redirect('DataImmunization')->with('success', 'Data immunisasi berhasil disimpan');
    }

    public function destroy($id)
    {
        $immunization = Immunization::findOrFail($id);

        if (!$immunization) {
            return redirect()->back()->with('error', 'Data Imunisasi Tidak Ada');
        }

        $vaccine = $immunization->vaccine;
        $vitamins = $immunization->vitamins;

        if ($vaccine) {
            $vaccine->stock++;
            $vaccine->save();
        }

        if ($vitamins) {
            $vitamins->stock++;
            $vitamins->save();
        }
        $immunization->delete();

        return redirect()->back()->with('success', 'Imunisasi Berhasil Di Hapus');
    }

    public function DestroyDataWeighing($id)
    {
        $weighing = Weighing::findOrFail($id);
        $weighing->delete();
        return back()->with('success', 'Berhasil Menghapus Data Penimbangan');
    }

    public function DataImmunizationIndex()
    {
        $immunizations = Immunization::all();
        // dd($immunizations);
        return view('content.dashboard.service.DataImmunization.index', compact('immunizations'));
    }

    public function DataWeighing()
    {

        if (auth()->user()->role == 'bidan') {
            $posyandu_nama = auth()->user()->midwife->posyandu;
            $weighing = Weighing::whereHas('child.parent', function ($query) use ($posyandu_nama) {
                $query->where('posyandu', $posyandu_nama);
            })->with(['child.parent'])->get();
        } elseif (auth()->user()->role == 'kader') {
            $posyandu_nama = 'anggrek';
            $weighing = Weighing::whereHas('child.parent', function ($query) {
                $query->where('posyandu', 'anggrek'); // atau variabel
            })->get();
        } else {
            $weighing = Weighing::orderBy('created_at', 'DESC')->get();
        }


        return view('content.dashboard.service.DataWeighing.index', compact('weighing'));
    }

    public function ChartWeighing($id)
    {

        $data = Weighing::Where("child_id", $id)->get();

        // Data Dummy (Usia dalam bulan)
        // $labels = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13"];



        // Berat Badan dalam kg (misal untuk anak laki-laki)
        // $berat = [3.2, 4.2, 5.1, 5.8, 6.4, 6.9, 7.3, 7.6, 7.9, 8.2, 8.4, 8.6, 8.8];

        $berat = [];
        foreach ($data as $item) {
            $berat[] = $item->body_weight;
        }


        // Tinggi Badan dalam cm
        // $tinggi = [50, 54, 57, 60, 62, 64, 66, 68, 69, 70, 71, 72, 73];


        // return view('content.dashboard.service.chartWeigh.index', compact('labels', 'berat', 'tinggi'));


        $who = [
            'usia' => range(0, 24), // 0–24 bulan
            '-2sd' => [2.5, 3.4, 4.4, 5.1, 5.6, 6.0, 6.4, 6.7, 6.9, 7.1, 7.3, 7.5, 7.6, 7.9, 8.1, 8.3, 8.5, 8.7, 8.9, 9.1, 9.2, 9.4, 9.5, 9.6, 9.7],
            'median' => [3.3, 4.5, 5.6, 6.4, 7.0, 7.5, 7.9, 8.3, 8.6, 8.9, 9.2, 9.4, 9.6, 9.8, 10.0, 10.2, 10.4, 10.6, 10.8, 11.0, 11.2, 11.3, 11.5, 11.7, 11.8],
            '+2sd' => [4.4, 5.8, 7.1, 8.0, 8.7, 9.2, 9.7, 10.1, 10.4, 10.7, 11.0, 11.3, 11.5, 11.7, 11.9, 12.1, 12.3, 12.5, 12.7, 12.9, 13.1, 13.3, 13.4, 13.6, 13.7],
        ];

        $data = [
            'berat_badan' => [
                3.2,
                4.6,
                5.5,
                6.9,
                7.1,
                7.5,
                7.8,
                8.4,
                8.5,
                8.9,
                9.3,
                9.5,
                9.7
            ]
        ];

        // dump($data);


        return view('content.dashboard.service.chartWeigh.index', compact('berat', 'who'));
    }
}
