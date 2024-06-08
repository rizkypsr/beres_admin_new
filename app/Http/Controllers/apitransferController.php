<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\transfer;
use Carbon\Carbon;
=======
use App\Models\Customer;
use App\Models\transfer;
use Carbon\Carbon;
use Illuminate\Http\Request;
>>>>>>> 0943348 (initial commit)
use Illuminate\Support\Facades\Validator;

class apitransferController extends Controller
{
    public function index($id)
    {

        if ($id == null) {
            return response()->json([
                'status' => 'success',
                'message' => 'Id Tidak Ditemukan',
                // 'data' => $transfer,
            ]);
        }

        $transfer = transfer::with('customer')->where('pengirim', $id)->get();

<<<<<<< HEAD

=======
>>>>>>> 0943348 (initial commit)
        // return view('ppob.ppob')->with('ppob',$ppob);
        return response()->json([
            'status' => 'success',
            'message' => 'data transfer',
            'data' => $transfer,
        ]);
    }

    public function add(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'penerima' => 'required',
            'nominal' => 'required',
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

        $transfer = new transfer;
        $customerpengirim = Customer::find($id);
        if ($customerpengirim->saldo_customer < $request->nominal) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Saldo Tidak Mencukupi',
                'data' => null,
            ], 400);
        }
        if ($customerpengirim == null) {
            return response()->json([
                'status' => 'failed',
<<<<<<< HEAD
                'message' => "data customer not found",
=======
                'message' => 'data customer not found',
>>>>>>> 0943348 (initial commit)
                'data' => null,
            ], 400);
        }
        $customerpenerima = customer::find($request->penerima);
        if ($customerpenerima == null) {
            return response()->json([
                'status' => 'failed',
<<<<<<< HEAD
                'message' => "data penerima not found",
=======
                'message' => 'data penerima not found',
>>>>>>> 0943348 (initial commit)
                'data' => null,
            ], 400);
        }
        if ($customerpenerima == $customerpengirim) {
            return response()->json([
                'status' => 'failed',
<<<<<<< HEAD
                'message' => "data penerima tidak valid",
=======
                'message' => 'data penerima tidak valid',
>>>>>>> 0943348 (initial commit)
                'data' => null,
            ], 400);
        }

        $transfer->id_kecamatan_transfer = $customerpengirim->id_kecamatan_customer;
        $transfer->pengirim = $id;
        $transfer->penerima = $request->penerima;
        $transfer->tanggal = Carbon::now()->format('Y-m-d');
        $transfer->nominal = $request->nominal;
        $nominal = $transfer->nominal;
        $transfer->created_at = Carbon::now();

        $transfer->save();

        $saldopengirim = $customerpengirim->saldo_customer;
        $saldotransfer = $nominal;
        $saldoakhir = $saldopengirim - $saldotransfer;
        $customerpengirim->saldo_customer = $saldoakhir;
        $customerpengirim->save();

        $saldopenerima = $customerpenerima->saldo_customer;
        $saldotransferpenerima = $nominal;
        $saldoakhirpenerima = $saldopenerima + $saldotransferpenerima;
        $customerpenerima->saldo_customer = $saldoakhirpenerima;
        $customerpenerima->save();

        // return view('ppob.ppob')->with('ppob',$ppob);
        return response()->json([
            'status' => 'success',
            'message' => 'data transfer',
            'data transfer' => $transfer,
            'data pengirim' => $customerpengirim,
            'data penerima' => $customerpenerima,
        ]);
    }
}
