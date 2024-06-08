<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\transaksijs;
use App\Models\produkjs;
use Carbon\Carbon;
=======
use App\Models\Customer;
use App\Models\produkjs;
use App\Models\transaksijs;
use Carbon\Carbon;
use Illuminate\Http\Request;
>>>>>>> 0943348 (initial commit)
use Illuminate\Support\Facades\Validator;

class apiTransaksijsController extends Controller
{
    public function index($id)
    {

        $tjs = transaksijs::with('kecamatan')->with('customer')->with('produkjs')->where('id_cs_js', $id)->get();
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
        return response()->json([
            'status' => 'success',
            'msg' => 'data transaksi',
            'data' => $tjs,
        ]);
    }
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
    public function add(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'jenissampah_js' => 'required',
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

        $customer = Customer::find($id);
        if ($customer == null) {
            return response()->json([
                'status' => 'failed',
<<<<<<< HEAD
                'msg' => "data not found",
=======
                'msg' => 'data not found',
>>>>>>> 0943348 (initial commit)
                'data' => null,
            ]);
        }

        foreach ($request->jenissampah_js as $key => $value) {
            if ($value['jumlah_js'] > 0) {
                $js = produkjs::find($value['id_js']);
                if ($js == null) {
                    return response()->json([
                        'status' => 'failed',
<<<<<<< HEAD
                        'msg' => "data not found",
=======
                        'msg' => 'data not found',
>>>>>>> 0943348 (initial commit)
                        'data' => null,
                    ]);
                }

<<<<<<< HEAD

                $tjs = new transaksijs;


                $tjs->id_cs_js =  $id;
                $tjs->id_kc_js =  $customer->id_kecamatan_customer;
=======
                $tjs = new transaksijs;

                $tjs->id_cs_js = $id;
                $tjs->id_kc_js = $customer->id_kecamatan_customer;
>>>>>>> 0943348 (initial commit)
                $tjs->jenissampah_js = $js->id_js;
                $tjs->satuan_js = $js->satuan_js;
                $tjs->jumlah_js = $value['jumlah_js'];
                if ($tjs->jumlah_js == 0) {
                    return response()->json([
                        'status' => 'failed',
<<<<<<< HEAD
                        'msg' => "data tidak bisa nol",
=======
                        'msg' => 'data tidak bisa nol',
>>>>>>> 0943348 (initial commit)
                        'data' => null,
                    ]);
                }
                $jumlah = $tjs->jumlah_js;

                $tjs->harga_js = $js->harga_js;
                $harga = $tjs->harga_js;
                $totalakhir = $jumlah * $harga;
                $tjs->total_js = $totalakhir;
                $tjs->status_js = 'belum diproses';
                $tjs->created_at = Carbon::now();

                $tjs->save();
            }
        }

        return response()->json([
            'status' => 'success',
<<<<<<< HEAD
            'msg' => "Get data successfully",
=======
            'msg' => 'Get data successfully',
>>>>>>> 0943348 (initial commit)
            // 'data jual sampah' => $tjs,
            // 'data customer' => $customer,
            // 'data topup' => $topup,

        ]);
    }
}
