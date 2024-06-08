<?php

namespace App\Http\Controllers;

use App\Models\Customer;
<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\layananjemput;
use App\Models\kecamatan;
use App\Models\User;
use Carbon\Carbon;

=======
use App\Models\kecamatan;
use App\Models\layananjemput;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
>>>>>>> 0943348 (initial commit)

class LayananjemputController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD
    public function index()
    {
        if (auth()->user()->role == "superadmin") {
            $lj = layananjemput::with('kecamatan')->with('customer')->get();
            $kecamatan = kecamatan::where('status_kecamatan', 0)->get();
            $customer = customer::where('customer_is_delete', 0)->get();
            return view('layananjemput.layananjemput')->with('lj', $lj)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }
        if (auth()->user()->role == "admin") {
            $user =  User::find(auth()->user()->id);
            $lj = layananjemput::with('kecamatan')->with('customer')->where('kecamatan_layanan', $user->id_kecamatan_user)->get();
            $kecamatan = kecamatan::where('id_kecamatan', $user->id_kecamatan_user)->get();
            $customer = customer::where('id_kecamatan_customer', $user->id_kecamatan_user)->where('customer_is_delete', 0)->get();
            return view('layananjemput.layananjemput')->with('lj', $lj)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }


=======

    public function index()
    {
        if (auth()->user()->role == 'superadmin') {
            $lj = layananjemput::with('kecamatan')->with('customer')->get();
            $kecamatan = kecamatan::where('status_kecamatan', 0)->get();
            $customer = customer::where('customer_is_delete', 0)->get();

            return view('layananjemput.layananjemput')->with('lj', $lj)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }
        if (auth()->user()->role == 'admin') {
            $user = User::find(auth()->user()->id);
            $lj = layananjemput::with('kecamatan')->with('customer')->where('kecamatan_layanan', $user->id_kecamatan_user)->get();
            $kecamatan = kecamatan::where('id_kecamatan', $user->id_kecamatan_user)->get();
            $customer = customer::where('id_kecamatan_customer', $user->id_kecamatan_user)->where('customer_is_delete', 0)->get();

            return view('layananjemput.layananjemput')->with('lj', $lj)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }

>>>>>>> 0943348 (initial commit)
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

        return view('layananjemput.layananjemput')->with('lj', $lj)->with('kecamatan', $kecamatan);
    }
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
    public function addlj(Request $request)
    {
        $customer = Customer::find($request->input('nama_layanan'));

        $lj = new layananjemput;
        $lj->kecamatan_layanan = $request->input('kecamatan_layanan');
        $lj->nama_layanan = $request->input('nama_layanan');
        $lj->alamat_layanan = $request->input('alamat_layanan');
        $lj->no_hp_layanan = $request->input('no_hp_layanan');
        $lj->jenis_sampah_layanan = $request->input('jenis_sampah_layanan');
        $lj->status_layanan = 'belum diproses';
        $lj->created_at = Carbon::now();

<<<<<<< HEAD

        $lj->save();

        return redirect("/lj")->with('success', 'Berhasil Menambahkan layanan jemput sampah');
    }
=======
        $lj->save();

        return redirect('/lj')->with('success', 'Berhasil Menambahkan layanan jemput sampah');
    }

>>>>>>> 0943348 (initial commit)
    public function updatelj(Request $request, $id)
    {

        $lj = layananjemput::find($id);
<<<<<<< HEAD
        // $lj->kecamatan_layanan = $request->input('kecamatan_layanan'); 
        // $lj->nama_layanan = $request->input('nama_layanan'); 
=======
        // $lj->kecamatan_layanan = $request->input('kecamatan_layanan');
        // $lj->nama_layanan = $request->input('nama_layanan');
>>>>>>> 0943348 (initial commit)
        $lj->alamat_layanan = $request->input('alamat_layanan');
        $lj->no_hp_layanan = $request->input('no_hp_layanan');
        $lj->jenis_sampah_layanan = $request->input('jenis_sampah_layanan');

<<<<<<< HEAD


        $lj->save();



        return redirect("/lj")->with('success', 'Berhasil Update layanan jemput sampah');
    }
=======
        $lj->save();

        return redirect('/lj')->with('success', 'Berhasil Update layanan jemput sampah');
    }

>>>>>>> 0943348 (initial commit)
    public function deletelj($id)
    {
        layananjemput::find($id)->delete();

<<<<<<< HEAD
        return redirect("/lj")->with('success', 'Berhasil hapus layanan jemput sampah');
    }
=======
        return redirect('/lj')->with('success', 'Berhasil hapus layanan jemput sampah');
    }

>>>>>>> 0943348 (initial commit)
    public function acclj(Request $request, $id)
    {

        $lj = layananjemput::find($id);
        $lj->status_layanan = 'sedang diproses';

        $lj->save();

<<<<<<< HEAD


        return redirect("/lj")->with('success', 'Berhasil Update layanan');
    }
=======
        return redirect('/lj')->with('success', 'Berhasil Update layanan');
    }

>>>>>>> 0943348 (initial commit)
    public function selesailj(Request $request, $id)
    {

        $lj = layananjemput::find($id);
        $lj->status_layanan = 'selesai';

        $lj->save();

<<<<<<< HEAD


        return redirect("/lj")->with('success', 'Berhasil Update layanan');
    }
    public function totallayanan()
    {
        if (auth()->user()->role == "superadmin") {
=======
        return redirect('/lj')->with('success', 'Berhasil Update layanan');
    }

    public function totallayanan()
    {
        if (auth()->user()->role == 'superadmin') {
>>>>>>> 0943348 (initial commit)
            $lj = layananjemput::where('status_layanan', 'belum diproses')->count();

            echo json_encode($lj);
        }
<<<<<<< HEAD
        if (auth()->user()->role == "admin") {
            $user =  User::find(auth()->user()->id);
=======
        if (auth()->user()->role == 'admin') {
            $user = User::find(auth()->user()->id);
>>>>>>> 0943348 (initial commit)
            $lju = layananjemput::where('kecamatan_layanan', $user->id_kecamatan_user)->where('status_layanan', 'belum diproses')->count();
            echo json_encode($lju);
        }
    }
<<<<<<< HEAD
    public function totallayanandiproses()
    {
        if (auth()->user()->role == "superadmin") {
=======

    public function totallayanandiproses()
    {
        if (auth()->user()->role == 'superadmin') {
>>>>>>> 0943348 (initial commit)
            $lj = layananjemput::where('status_layanan', 'sedang diproses')->count();

            echo json_encode($lj);
        }
<<<<<<< HEAD
        if (auth()->user()->role == "admin") {
            $user =  User::find(auth()->user()->id);
=======
        if (auth()->user()->role == 'admin') {
            $user = User::find(auth()->user()->id);
>>>>>>> 0943348 (initial commit)
            $lju = layananjemput::where('kecamatan_layanan', $user->id_kecamatan_user)->where('status_layanan', 'sedang diproses')->count();
            echo json_encode($lju);
        }
    }
}
