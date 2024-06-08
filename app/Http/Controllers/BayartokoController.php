<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\bayartoko;
use App\Models\User;
use App\Exports\bayartokoexport;
use App\Http\Controllers\Controller;
=======
use App\Exports\bayartokoexport;
use App\Models\bayartoko;
use App\Models\User;
>>>>>>> 0943348 (initial commit)
use Maatwebsite\Excel\Facades\Excel;

class BayartokoController extends Controller
{
<<<<<<< HEAD
    public function index(){
        if (auth()->user()->role=="superadmin") {
            $bayar = bayartoko::with('kecamatan','customer','customertoko')->get();
            return view('bayartoko.bayartoko')->with('bayar',$bayar);
        }
        
        if (auth()->user()->role=="admin") {
            $user = User::find(auth()->user()->id);
            $bayar = bayartoko::with('kecamatan','customer','customertoko')->where('id_kecamatan_bayar',$user->id_kecamatan_user)->get();
                  
            return view('bayartoko.bayartoko')->with('bayar',$bayar);
        }
       
       
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();
        
      
}
public function export(){
    return Excel::download(new bayartokoexport,'bayartoko.xlsx');
}
=======
    public function index()
    {
        if (auth()->user()->role == 'superadmin') {
            $bayar = bayartoko::with('kecamatan', 'customer', 'customertoko')->get();

            return view('bayartoko.bayartoko')->with('bayar', $bayar);
        }

        if (auth()->user()->role == 'admin') {
            $user = User::find(auth()->user()->id);
            $bayar = bayartoko::with('kecamatan', 'customer', 'customertoko')->where('id_kecamatan_bayar', $user->id_kecamatan_user)->get();

            return view('bayartoko.bayartoko')->with('bayar', $bayar);
        }

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

    }

    public function export()
    {
        return Excel::download(new bayartokoexport, 'bayartoko.xlsx');
    }
>>>>>>> 0943348 (initial commit)
}
