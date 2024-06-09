<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\kota;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {

        $kota = kota::find($id);

        $kecamatan = Kecamatan::where('id_kota_kecamatan', $kota->id_kota)->where('status_kecamatan', 0)->with('kota')->get();

        return view('kota.kecamatan')->with('kecamatan', $kecamatan)->with('kota', $kota);
    }

    public function addkecamatan(Request $request, $id)
    {

        $kecamatan = new Kecamatan;
        $kecamatan->id_kota_kecamatan = $request->input('id_kota_kecamatan');
        $kecamatan->nama_kecamatan = $request->input('nama_kecamatan');
        $kecamatan->save();

        return redirect("/kecamatan/$id")->with('success', 'Berhasil Menambahkan kecamatan');
    }

    public function updatekecamatan(Request $request, $id)
    {

        $kecamatan = Kecamatan::find($id);
        $kecamatan->id_kota_kecamatan = $request->input('id_kota_kecamatan');
        $kecamatan->nama_kecamatan = $request->input('nama_kecamatan');
        $kecamatan->save();
        $kota = kota::find($kecamatan->id_kota_kecamatan);

        return redirect("/kecamatan/$kota->id_kota")->with('success', 'Berhasil Update kecamatan');
    }

    public function deletekecamatan(Request $request, $id)
    {

        // $kota = kota::find($id);
        // $kota_id = $kota->kecamatan->id_kota_kecamatan;
        $kecamatan = Kecamatan::find($id);
        $kecamatan->status_kecamatan = 1;
        $kecamatan->update();
        // $kota = kota::where('id_kota',$kecamatan->id_kota_kecamatan)->get();
        $kota = kota::find($kecamatan->id_kota_kecamatan);

        return redirect("/kecamatan/$kota->id_kota")->with('success', 'Berhasil Update kecamatan');
    }
}
