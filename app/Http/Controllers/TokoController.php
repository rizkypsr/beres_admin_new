<?php

namespace App\Http\Controllers;

use App\Models\Customer;
<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\topup;
use App\Models\transaksi;
use App\Models\kecamatan;
use App\Models\User;
use Carbon\Carbon;
=======
use App\Models\kecamatan;
use App\Models\topup;
use App\Models\transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
>>>>>>> 0943348 (initial commit)

class TokoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD
    public function index()
    {
        if (auth()->user()->role == "superadmin") {
            $toko = Customer::with('kecamatan')->where('role_customer', 'toko')->get();
            $kecamatan = kecamatan::where('status_kecamatan', 0)->get();
            return view('toko.toko')->with('toko', $toko)->with('kecamatan', $kecamatan);
        }
        if (auth()->user()->role == "admin") {
            $user = User::find(auth()->user()->id);
            $toko = Customer::with('kecamatan')->where('id_kecamatan_customer', $user->id_kecamatan_user)->where('role_customer', 'toko')->get();
            $kecamatan = kecamatan::where('id_kecamatan', $user->id_kecamatan_user);
=======

    public function index()
    {
        if (auth()->user()->role == 'superadmin') {
            $toko = Customer::with('kecamatan')->where('role_customer', 'toko')->get();
            $kecamatan = kecamatan::where('status_kecamatan', 0)->get();

            return view('toko.toko')->with('toko', $toko)->with('kecamatan', $kecamatan);
        }
        if (auth()->user()->role == 'admin') {
            $user = User::find(auth()->user()->id);
            $toko = Customer::with('kecamatan')->where('id_kecamatan_customer', $user->id_kecamatan_user)->where('role_customer', 'toko')->get();
            $kecamatan = kecamatan::where('id_kecamatan', $user->id_kecamatan_user);

>>>>>>> 0943348 (initial commit)
            return view('toko.toko')->with('toko', $toko)->with('kecamatan', $kecamatan);
        }

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

<<<<<<< HEAD

    }
=======
    }

>>>>>>> 0943348 (initial commit)
    public function addtoko(Request $request)
    {

        if (Customer::find($request->input('id_customer'))) {
            return redirect('/toko')->with('warning', 'Id Toko sudah tersedia');
        }

        $toko = new Customer;
        $toko->id_customer = $request->input('id_customer');
        $toko->id_kecamatan_customer = $request->input('id_kecamatan_customer');
        $toko->nama = $request->input('nama');
        $toko->alamat_customer = $request->input('alamat_customer');
        $toko->saldo_customer = $request->input('saldo_customer');
        $toko->pin_customer = Hash::make($request->pin_customer);
        $toko->no_hp_customer = $request->input('no_hp_customer');
        $toko->tempat_lahir = $request->input('tempat_lahir');
        $toko->tgl_lahir = $request->input('tgl_lahir');
        $toko->role_customer = 'toko';
        $toko->save();

<<<<<<< HEAD
        return redirect("/toko")->with('success', 'Berhasil Menambahkan Toko');
    }
=======
        return redirect('/toko')->with('success', 'Berhasil Menambahkan Toko');
    }

>>>>>>> 0943348 (initial commit)
    public function updatetoko(Request $request, $id)
    {

        $toko = Customer::find($id);
<<<<<<< HEAD
        // $toko->id_customer = $request->input('id_customer'); 
=======
        // $toko->id_customer = $request->input('id_customer');
>>>>>>> 0943348 (initial commit)
        $toko->id_kecamatan_customer = $request->input('id_kecamatan_customer');
        $toko->nama = $request->input('nama');
        $toko->alamat_customer = $request->input('alamat_customer');
        // $toko->saldo_customer = $request->input('saldo_customer');
        $toko->no_hp_customer = $request->input('no_hp_customer');
        $toko->tempat_lahir = $request->input('tempat_lahir');
        $toko->tgl_lahir = $request->input('tgl_lahir');
        $toko->role_customer = 'toko';

        if ($request->input('pin_customer')) {
            $toko->pin_customer = Hash::make($request->pin_customer);
        }

        $toko->save();

<<<<<<< HEAD
        return redirect("/toko")->with('success', 'Berhasil Update toko');
    }
=======
        return redirect('/toko')->with('success', 'Berhasil Update toko');
    }

>>>>>>> 0943348 (initial commit)
    public function deletetoko($id)
    {
        Customer::find($id)->delete();

<<<<<<< HEAD
        return redirect("/toko")->with('success', 'Berhasil Menghapus toko');
    }
=======
        return redirect('/toko')->with('success', 'Berhasil Menghapus toko');
    }

>>>>>>> 0943348 (initial commit)
    public function topuptoko(Request $request, $id)
    {

        $toko = Customer::find($id);

        $saldoawal = $toko->saldo_customer;
        $saldotopup = $request->input('saldo_customer');
        $saldoakhir = $saldoawal + $saldotopup;
        $toko->saldo_customer = $saldoakhir;
        $toko->save();

        $topup = new topup;
        $topup->nama_customer_topup = $toko->nama;
        $topup->id_kecamatan_topup = $toko->id_kecamatan_customer;
        $topup->tanggal_topup = Carbon::now();
        $topup->nominal_topup = $saldotopup;
        $topup->total_saldo_topup = $toko->saldo_customer;
        $topup->save();

<<<<<<< HEAD
        return redirect("/toko")->with('success', 'Berhasil menambahkan saldo');
=======
        return redirect('/toko')->with('success', 'Berhasil menambahkan saldo');
>>>>>>> 0943348 (initial commit)
    }
}
