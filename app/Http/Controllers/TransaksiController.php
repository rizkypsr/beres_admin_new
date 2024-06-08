<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> 0943348 (initial commit)
use App\Models\transaksi;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
    public function index($id)
    {

        $transaksi = transaksi::with('customer')->where('id_customer_transaksi', $id)->get();

<<<<<<< HEAD

=======
>>>>>>> 0943348 (initial commit)
        return view('customer.transaksi')->with('transaksi', $transaksi);
    }
}
