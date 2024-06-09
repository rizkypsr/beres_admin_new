<?php

namespace App\Http\Controllers;

use App\Exports\KecamatanExport;
use App\Models\Kecamatan;
use App\Models\kota;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kota = kota::where('kota_is_delete', 0)->get();

        return view('kota.kota')->with('kota', $kota);
    }

    public function addkota(Request $request)
    {

        $kota = new kota;
        $kota->nama_kota = $request->input('nama_kota');
        $kota->save();

        return redirect('/kota')->with('success', 'Berhasil Menambahkan kota');
    }

    public function updatekota(Request $request, $id)
    {

        $kota = kota::find($id);
        $kota->nama_kota = $request->input('nama_kota');
        $kota->save();

        return redirect('/kota')->with('success', 'Berhasil update kota');
    }

    public function deletekota($id)
    {

        $kota = kota::find($id);
        $kota->kota_is_delete = 1;

        $ke = $kota->kecamatan->id_kota_kecamatan;

        $kecamatan = Kecamatan::where('id_kota_kecamatan', $kota->id_kota)->get();
        foreach ($kecamatan as $key => $value) {
            $value->status_kecamatan = 1;
            $value->save();
        }

        $kota->save();

        return redirect('/kota')->with('success', 'Berhasil Delete Kota');
    }

    public function export()
    {
        return Excel::download(new KecamatanExport, 'kota_kecamatan.xlsx');
    }
}
