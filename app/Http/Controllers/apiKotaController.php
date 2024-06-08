<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kota;
class apiKotaController extends Controller
{
    public function index(){
        $kota = kota::where('kota_is_delete',0)->get();
        return response()->json([
            'status' => 'success',
            'msg' => 'data transaksi',
            'data' => $kota ,
        ]);


=======
use App\Models\kota;

class apiKotaController extends Controller
{
    public function index()
    {
        $kota = kota::where('kota_is_delete', 0)->get();

        return response()->json([
            'status' => 'success',
            'msg' => 'data transaksi',
            'data' => $kota,
        ]);

>>>>>>> 0943348 (initial commit)
    }
}
