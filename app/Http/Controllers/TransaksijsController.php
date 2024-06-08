<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\transaksijs;
use App\Models\kecamatan;
use App\Models\produkjs;
use App\Models\User;
use App\Models\topup;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\transaksijsexport;
use App\Models\Customer;
=======
use App\Exports\transaksijsexport;
use App\Models\Customer;
use App\Models\kecamatan;
use App\Models\produkjs;
use App\Models\topup;
use App\Models\transaksijs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
>>>>>>> 0943348 (initial commit)

class TransaksijsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
    public function export()
    {
        return Excel::download(new transaksijsexport, 'transaksijs.xlsx');
    }
<<<<<<< HEAD
    public function log()
    {
        if (auth()->user()->role == "superadmin") {
=======

    public function log()
    {
        if (auth()->user()->role == 'superadmin') {
>>>>>>> 0943348 (initial commit)
            $tjs = transaksijs::with('kecamatan')->with('customer')->with('produkjs')->get();
            $kecamatan = kecamatan::where('status_kecamatan', 0)->get();
            $produkjs = produkjs::where('js_is_delete', 0)->get();
            $customer = Customer::where('customer_is_delete', 0)->get();
<<<<<<< HEAD
            return view('transaksijs.logtransaksijs')->with('produkjs', $produkjs)->with('tjs', $tjs)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }

        if (auth()->user()->role == "admin") {
=======

            return view('transaksijs.logtransaksijs')->with('produkjs', $produkjs)->with('tjs', $tjs)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }

        if (auth()->user()->role == 'admin') {
>>>>>>> 0943348 (initial commit)
            $user = User::find(auth()->user()->id);
            $tjs = transaksijs::with('kecamatan')->with('customer')->where('id_kc_js', $user->id_kecamatan_user)->get();
            $produkjs = produkjs::where('js_is_delete', 0)->get();
            $kecamatan = kecamatan::where('id_kecamatan', $user->id_kecamatan_user)->where('status_kecamatan', 0)->get();
            $customer = Customer::where('id_kecamatan_customer', $user->id_kecamatan_user)->where('customer_is_delete', 0)->get();
<<<<<<< HEAD
            return view('transaksijs.logtransaksijs')->with('produkjs', $produkjs)->with('tjs', $tjs)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }
    }
    public function index()
    {
        if (auth()->user()->role == "superadmin") {
=======

            return view('transaksijs.logtransaksijs')->with('produkjs', $produkjs)->with('tjs', $tjs)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }
    }

    public function index()
    {
        if (auth()->user()->role == 'superadmin') {
>>>>>>> 0943348 (initial commit)
            $tjs = transaksijs::with('kecamatan')->with('customer')->with('produkjs')->get();
            $kecamatan = kecamatan::where('status_kecamatan', 0)->get();
            $produkjs = produkjs::where('js_is_delete', 0)->get();
            $customer = Customer::where('customer_is_delete', 0)->get();
<<<<<<< HEAD
            return view('transaksijs.transaksijs')->with('produkjs', $produkjs)->with('tjs', $tjs)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }

        if (auth()->user()->role == "admin") {
=======

            return view('transaksijs.transaksijs')->with('produkjs', $produkjs)->with('tjs', $tjs)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }

        if (auth()->user()->role == 'admin') {
>>>>>>> 0943348 (initial commit)
            $user = User::find(auth()->user()->id);
            $tjs = transaksijs::with('kecamatan')->with('customer')->where('id_kc_js', $user->id_kecamatan_user)->get();
            $produkjs = produkjs::where('js_is_delete', 0)->get();
            $kecamatan = kecamatan::where('id_kecamatan', $user->id_kecamatan_user)->where('status_kecamatan', 0)->get();
            $customer = Customer::where('id_kecamatan_customer', $user->id_kecamatan_user)->where('customer_is_delete', 0)->get();
<<<<<<< HEAD
            return view('transaksijs.transaksijs')->with('produkjs', $produkjs)->with('tjs', $tjs)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }


        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();


    }
=======

            return view('transaksijs.transaksijs')->with('produkjs', $produkjs)->with('tjs', $tjs)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

    }

>>>>>>> 0943348 (initial commit)
    public function addtransaksijs(Request $request)
    {

        $customer = Customer::findOrFail($request->input('id_cs_js'));
        $produkjs = produkjs::findOrFail($request->input('jenissampah_js'));
        $tjs = new transaksijs;
        $tjs->id_cs_js = $customer->id_customer;
        $tjs->id_kc_js = $customer->id_kecamatan_customer;
        $tjs->jenissampah_js = $produkjs->id_js;
        $tjs->satuan_js = $produkjs->satuan_js;
        $tjs->jumlah_js = $request->input('jumlah_js');
        $jumlah = $tjs->jumlah_js;
        $tjs->harga_js = $produkjs->harga_js;
        $harga = $tjs->harga_js;
        $totalakhir = $jumlah * $harga;
        $tjs->total_js = $totalakhir;
        $tjs->status_js = 'belum diproses';
        $tjs->created_at = Carbon::now();

        $tjs->save();

<<<<<<< HEAD
        return redirect("/transaksijs")->with('success', 'Berhasil Menambahkan transaksi jual sampah');
    }
=======
        return redirect('/transaksijs')->with('success', 'Berhasil Menambahkan transaksi jual sampah');
    }

>>>>>>> 0943348 (initial commit)
    public function updatetransaksijs(Request $request, $id)
    {

        $tjs = transaksijs::find($id);
<<<<<<< HEAD
        // $tjs->id_cs_js = $request->input('id_cs_js'); 
        // $tjs->id_kc_js = $request->input('id_kc_js'); 
=======
        // $tjs->id_cs_js = $request->input('id_cs_js');
        // $tjs->id_kc_js = $request->input('id_kc_js');
>>>>>>> 0943348 (initial commit)
        $tjs->jenissampah_js = $request->input('jenissampah_js');
        $tjs->satuan_js = $request->input('satuan_js');
        $tjs->jumlah_js = $request->input('jumlah_js');
        $tjs->harga_js = $request->input('harga_js');
        $tjs->total_js = $tjs->jumlah_js * $tjs->harga_js;
        $tjs->save();

<<<<<<< HEAD


        return redirect("/transaksijs")->with('success', 'Berhasil Update produk');
    }
=======
        return redirect('/transaksijs')->with('success', 'Berhasil Update produk');
    }

>>>>>>> 0943348 (initial commit)
    public function deletetransaksijs($id)
    {
        transaksijs::find($id)->delete();

<<<<<<< HEAD
        return redirect("/transaksijs")->with('success', 'Berhasil hapus transaksi produk');
    }
=======
        return redirect('/transaksijs')->with('success', 'Berhasil hapus transaksi produk');
    }

>>>>>>> 0943348 (initial commit)
    public function acctransaksijs(Request $request, $id)
    {

        $tjs = transaksijs::find($id);
        $tjs->status_js = 'sedang diproses';

        $tjs->save();

<<<<<<< HEAD


        return redirect("/transaksijs")->with('success', 'Berhasil Update produk');
    }
=======
        return redirect('/transaksijs')->with('success', 'Berhasil Update produk');
    }

>>>>>>> 0943348 (initial commit)
    public function selesaitransaksijs(Request $request, $id)
    {

        $tjs = transaksijs::find($id);
        $customer = Customer::find($tjs->id_cs_js);

        $tjs->status_js = 'selesai';

        $tjs->save();

        $saldoawal = $customer->saldo_customer;
        $saldotopup = $tjs->total_js;
        $saldoakhir = $saldoawal + $saldotopup;
        $customer->saldo_customer = $saldoakhir;
        $customer->save();

<<<<<<< HEAD

=======
>>>>>>> 0943348 (initial commit)
        $topup = new topup;
        $topup->nama_customer_topup = $customer->nama;
        $topup->id_kecamatan_topup = $tjs->id_kc_js;
        $topup->tanggal_topup = Carbon::now();
        $topup->nominal_topup = $tjs->total_js;
        $topup->total_saldo_topup = $customer->saldo_customer;
        $topup->save();

<<<<<<< HEAD
        return redirect("/transaksijs")->with('success', 'Berhasil Update produk');
    }
    public function totaljualsampah()
    {
        if (auth()->user()->role == "superadmin") {
            $tjs = transaksijs::where('status_js', 'belum diproses')->count();
            echo json_encode($tjs);
        }
        if (auth()->user()->role == "admin") {
=======
        return redirect('/transaksijs')->with('success', 'Berhasil Update produk');
    }

    public function totaljualsampah()
    {
        if (auth()->user()->role == 'superadmin') {
            $tjs = transaksijs::where('status_js', 'belum diproses')->count();
            echo json_encode($tjs);
        }
        if (auth()->user()->role == 'admin') {
>>>>>>> 0943348 (initial commit)
            $user = User::find(auth()->user()->id);
            $tjsu = transaksijs::where('id_kc_js', $user->id_kecamatan_user)->where('status_js', 'belum diproses')->count();
            echo json_encode($tjsu);
        }
    }
<<<<<<< HEAD
    public function totaljualsampahdiproses()
    {
        if (auth()->user()->role == "superadmin") {
            $tjs = transaksijs::where('status_js', 'sedang diproses')->count();
            echo json_encode($tjs);
        }
        if (auth()->user()->role == "admin") {
=======

    public function totaljualsampahdiproses()
    {
        if (auth()->user()->role == 'superadmin') {
            $tjs = transaksijs::where('status_js', 'sedang diproses')->count();
            echo json_encode($tjs);
        }
        if (auth()->user()->role == 'admin') {
>>>>>>> 0943348 (initial commit)
            $user = User::find(auth()->user()->id);
            $tjsu = transaksijs::where('id_kc_js', $user->id_kecamatan_user)->where('status_js', 'sedang diproses')->count();
            echo json_encode($tjsu);
        }
    }
}
