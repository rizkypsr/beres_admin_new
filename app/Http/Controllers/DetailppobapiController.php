<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> 0943348 (initial commit)
use App\Models\detailppob;

class DetailppobapiController extends Controller
{
<<<<<<< HEAD
    public function index($id){
        
        $detailppob = detailppob::with('ppob')->where('id_ppob_detail',$id)->where('detailppob_is_delete',0)->get();
        // $ppob = ppob::all();
       
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();
        
=======
    public function index($id)
    {

        $detailppob = detailppob::with('ppob')->where('id_ppob_detail', $id)->where('detailppob_is_delete', 0)->get();
        // $ppob = ppob::all();

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

>>>>>>> 0943348 (initial commit)
        return response()->json([
            'status' => 'success',
            'msg' => 'data detail ppob',
            'data' => $detailppob,
        ]);
    }
}
