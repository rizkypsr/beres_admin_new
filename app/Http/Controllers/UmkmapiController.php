<?php

namespace App\Http\Controllers;

use App\Models\umkm;

class UmkmapiController extends Controller
{
    public function index($id)
    {

        $umkm = umkm::with('kecamatan')->where('id_kecamatan_umkm', $id)->where('umkm_is_delete', 0)->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar UMKM',
            'data' => $umkm,
        ], 200);
    }
}
