<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;

class apiKecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = kecamatan::with('kota')->where('status_kecamatan', 0)->get();

        return response()->json([
            'status' => 'success',
            'msg' => 'data transaksi',
            'data' => $kecamatan,
        ]);
    }
}
