<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> 0943348 (initial commit)
use App\Models\qurbansampah;

class QurbansampahapiController extends Controller
{
<<<<<<< HEAD
    public function index(){
        
        $qurban = qurbansampah::all();
        
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();
        
=======
    public function index()
    {

        $qurban = qurbansampah::all();

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

>>>>>>> 0943348 (initial commit)
        return response()->json($qurban);
    }
}
