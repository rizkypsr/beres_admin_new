<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> 0943348 (initial commit)
use App\Models\produkumkm;

class ProdukumkmapiController extends Controller
{
    public function index($id)
    {

        $produkumkm = produkumkm::with('umkm')->where('id_umkm_produk', $id)->where('produkumkm_is_delete', 0)->get();
        // $umkm = umkm::all();

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Produk UMKM',
<<<<<<< HEAD
            'data' => $produkumkm
=======
            'data' => $produkumkm,
>>>>>>> 0943348 (initial commit)
        ], 200);
    }
}
