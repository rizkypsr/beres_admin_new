<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksippob;
use App\Models\detailppob;
use Carbon\Carbon;
=======
use App\Models\detailppob;
use App\Models\transaksippob;
use Carbon\Carbon;
use Illuminate\Http\Request;
>>>>>>> 0943348 (initial commit)
use Illuminate\Support\Facades\Validator;

class apitransaksippobController extends Controller
{
    public function index($id)
    {

        $tpp = transaksippob::with('customer')->where('customer_ppob', $id)->get();
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
        // $tpp = transaksippob::all();
        // return view('ppob.ppob')->with('ppob',$ppob);
        return response()->json([
            'status' => 'success',
            'message' => 'data ppob',
            'data' => $tpp,
        ]);
    }
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
    public function add(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'produk_transaksi_ppob' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
<<<<<<< HEAD
                'msg' => "cek your data wik",
                'data' => $validate->errors()
=======
                'msg' => 'cek your data wik',
                'data' => $validate->errors(),
>>>>>>> 0943348 (initial commit)
            ], 400);
        }

        $detailppob = detailppob::find($request->produk_transaksi_ppob);

        if ($detailppob == null) {
            return response()->json([
                'status' => 'failed',
<<<<<<< HEAD
                'msg' => "data ppob not found",
=======
                'msg' => 'data ppob not found',
>>>>>>> 0943348 (initial commit)
                'data' => null,
            ]);
        }

        $tpp = new transaksippob;
        $tpp->customer_ppob = $id;
        $tpp->produk_transaksi_ppob = $detailppob->id_detailppob;
        $tpp->harga_transaksi_ppob = $detailppob->harga_detailppob;
        $tpp->bayar_transaksi_ppob = $detailppob->bayar_detailppob;
        $tpp->tanggal_transaksi_ppob = Carbon::now()->format('Y-m-d');
        $tpp->nomor_inputan = $id;
        $tpp->status_ppob = 'belum diproses';
        $tpp->created_at = Carbon::now();

        $tpp->save();

        return response()->json([
            'status' => 'success',
            'message' => 'data ppob',
            'data' => $tpp,
        ]);
    }
}
