<?php

namespace App\Http\Controllers;

use App\Exports\transferexport;
use App\Models\Transfer;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class TransferController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'superadmin') {
            $transfer = Transfer::with(['kecamatan', 'customer', 'customerpenerima'])->get();

            return view('transfer.transfer', compact('transfer'));
        }

        if (auth()->user()->role == 'admin') {
            $user = User::find(auth()->user()->id);
            $transfer = Transfer::with('kecamatan')->with('customer', 'customerpenerima')->where('id_kecamatan_transfer', $user->id_kecamatan_user)->get();

            return view('transfer.transfer')->with('transfer', $transfer);
        }

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

    }

    public function export()
    {
        return Excel::download(new transferexport, 'transfer.xlsx');
    }
}
