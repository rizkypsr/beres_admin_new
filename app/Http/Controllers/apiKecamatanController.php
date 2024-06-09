<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;

class apiKecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::with('kota')->where('status_kecamatan', 0)->get();

        return response()->json([
            'status' => 'success',
            'msg' => 'data transaksi',
            'data' => $kecamatan,
        ]);
    }
}
