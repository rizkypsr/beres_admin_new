<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bayartoko;
use App\Models\Customer;
use Carbon\Carbon;
use \Validator;
=======
use App\Models\bayartoko;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
>>>>>>> 0943348 (initial commit)

class apibayartokoController extends Controller
{
    public function index($id)
    {

        $bt = bayartoko::with('customer')->where('pengirim_bayar', $id)->get();
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
        // return view('ppob.ppob')->with('ppob',$ppob);
        return response()->json([
            'status' => 'success',
            'message' => 'data transfer',
            'data' => $bt,
        ]);
    }
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
    public function add(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            // 'id_kecamatan_transfer' => 'required',
            // 'pengirim' => 'required',
            'toko_bayar' => 'required',
            // 'tanggal' => 'required',
            // 'tanggal_transaksi_ppob' => 'required',
            'nominal_bayar' => 'required',
            // 'total_js' => 'required',

        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'success',
<<<<<<< HEAD
                'msg' => "Get data successfully",
                'data' => $validate->errors()
=======
                'msg' => 'Get data successfully',
                'data' => $validate->errors(),
>>>>>>> 0943348 (initial commit)
            ], 400);
        }
        $bt = new bayartoko;
        $customerpengirim = Customer::find($id);
        if ($customerpengirim == null) {
            return response()->json([
                'status' => 'failed',
<<<<<<< HEAD
                'msg' => "data customer not found",
=======
                'msg' => 'data customer not found',
>>>>>>> 0943348 (initial commit)
                'data' => null,
            ]);
        }
        if ($customerpengirim->saldo_customer < $bt->nominal_bayar) {
            return response()->json([
                'status' => 'success',
                'message' => 'Saldo Tidak Mencukupi',
                'data' => null,

            ]);
        }
        $customerpenerima = Customer::find($request->toko_bayar);
        if ($customerpenerima == null) {
            return response()->json([
                'status' => 'failed',
<<<<<<< HEAD
                'msg' => "data toko not found",
                'data' => null,
            ]);
        }
        if ($customerpenerima->role_customer != "toko") {
=======
                'msg' => 'data toko not found',
                'data' => null,
            ]);
        }
        if ($customerpenerima->role_customer != 'toko') {
>>>>>>> 0943348 (initial commit)
            return response()->json([
                'status' => 'success',
                'message' => 'penerima bukan toko',
                'data transfer' => null,
            ]);
        }

<<<<<<< HEAD
        if ($customerpenerima->role_customer == "toko") {
=======
        if ($customerpenerima->role_customer == 'toko') {
>>>>>>> 0943348 (initial commit)
            $bt->id_kecamatan_bayar = $customerpengirim->id_kecamatan_customer;
            $bt->pengirim_bayar = $id;
            $bt->toko_bayar = $customerpenerima->id_customer;
            $bt->tanggal_bayar = Carbon::now()->format('Y-m-d');
            $bt->nominal_bayar = $request->nominal_bayar;
            $nominal = $bt->nominal_bayar;

<<<<<<< HEAD


            $bt->save();


=======
            $bt->save();

>>>>>>> 0943348 (initial commit)
            $saldopengirim = $customerpengirim->saldo_customer;
            $saldotransfer = $nominal;
            $saldoakhir = $saldopengirim - $saldotransfer;
            $customerpengirim->saldo_customer = $saldoakhir;
            $customerpengirim->save();

<<<<<<< HEAD



=======
>>>>>>> 0943348 (initial commit)
            $saldopenerima = $customerpenerima->saldo_customer;
            $saldotransferpenerima = $nominal;
            $saldoakhirpenerima = $saldopenerima + $saldotransferpenerima;
            $customerpenerima->saldo_customer = $saldoakhirpenerima;
            $customerpenerima->save();

            return response()->json([
                'status' => 'success',
                'message' => 'data transfer',
                'data transfer' => $bt,
                'data pengirim' => $customerpengirim,
                'data penerima' => $customerpenerima,
            ]);
        }

<<<<<<< HEAD











=======
>>>>>>> 0943348 (initial commit)
        // return view('ppob.ppob')->with('ppob',$ppob);SDSASF

    }
}
