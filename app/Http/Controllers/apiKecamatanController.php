<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
=======
>>>>>>> 0943348 (initial commit)
use App\Models\kecamatan;

class apiKecamatanController extends Controller
{
<<<<<<< HEAD

    public function index(){
        $kecamatan = kecamatan::with('kota')->where('status_kecamatan',0)->get();
        return response()->json([
            'status' => 'success',
            'msg' => 'data transaksi',
            'data' => $kecamatan ,
=======
    public function index()
    {
        $kecamatan = kecamatan::with('kota')->where('status_kecamatan', 0)->get();

        return response()->json([
            'status' => 'success',
            'msg' => 'data transaksi',
            'data' => $kecamatan,
>>>>>>> 0943348 (initial commit)
        ]);
    }
}
