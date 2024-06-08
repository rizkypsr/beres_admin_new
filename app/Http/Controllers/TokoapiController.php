<?php

namespace App\Http\Controllers;

use App\Models\Customer;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> 0943348 (initial commit)

class TokoapiController extends Controller
{
    public function index()
    {

        $toko = Customer::with('kecamatan')->get();
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
        // $kecamatan = kecamatan::all();
        return response()->json($toko);
    }
}
