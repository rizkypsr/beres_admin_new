<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\transaksippob;
use App\Models\ppob;
use App\Models\detailppob;
use App\Exports\ppobexport;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

=======
use App\Exports\ppobexport;
use App\Models\Customer;
use App\Models\detailppob;
use App\Models\ppob;
use App\Models\transaksippob;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
>>>>>>> 0943348 (initial commit)

class TransaksippobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD
    public function index()
    {
        if (auth()->user()->role == "superadmin" || auth()->user()->role == "adminppob") {
=======

    public function index()
    {
        if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'adminppob') {
>>>>>>> 0943348 (initial commit)
            $tpp = transaksippob::with('ppob', 'customer')->get();
            $detailppob = detailppob::with('ppob')->where('detailppob_is_delete', 0)->get();
            $ppob = ppob::where('ppob_is_delete', 0)->get();
            $customer = Customer::where('customer_is_delete', 0)->get();
<<<<<<< HEAD
            return view('transaksippob.transaksippob')->with('tpp', $tpp)->with('detailppob', $detailppob)->with('customer', $customer)->with('ppob', $ppob);
        }




        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();


    }
    public function addtpp(Request $request)
    {


        $customer = Customer::find($request->input('customer_ppob'));
        $detailppob = detailppob::find($request->input('harga_transaksi_ppob'));


=======

            return view('transaksippob.transaksippob')->with('tpp', $tpp)->with('detailppob', $detailppob)->with('customer', $customer)->with('ppob', $ppob);
        }

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

    }

    public function addtpp(Request $request)
    {

        $customer = Customer::find($request->input('customer_ppob'));
        $detailppob = detailppob::find($request->input('harga_transaksi_ppob'));

>>>>>>> 0943348 (initial commit)
        $tpp = new transaksippob;
        $tpp->customer_ppob = $customer->id_customer;
        $tpp->produk_transaksi_ppob = $detailppob->id_ppob_detail;
        $tpp->harga_transaksi_ppob = $detailppob->harga_detailppob;
        $tpp->bayar_transaksi_ppob = $detailppob->bayar_detailppob;
        $tpp->tanggal_transaksi_ppob = $request->input('tanggal_transaksi_ppob');
        $tpp->nomor_inputan = $request->input('nomor_inputan');
        $tpp->status_ppob = 'belum diproses';
        $tpp->created_at = Carbon::now();

<<<<<<< HEAD

        $tpp->save();



        return redirect("/tpp")->with('success', 'Berhasil Menambahkan transaksi ppob');
    }
=======
        $tpp->save();

        return redirect('/tpp')->with('success', 'Berhasil Menambahkan transaksi ppob');
    }

>>>>>>> 0943348 (initial commit)
    public function updatetpp(Request $request, $id)
    {

        // $tpp = transaksippob::find($id);
<<<<<<< HEAD
        // // $tpp->customer_ppob = $request->input('customer_ppob'); 
        // // $tpp->produk_transaksi_ppob = $request->input('produk_ppob'); 
=======
        // // $tpp->customer_ppob = $request->input('customer_ppob');
        // // $tpp->produk_transaksi_ppob = $request->input('produk_ppob');
>>>>>>> 0943348 (initial commit)
        // $tpp->harga_transaksi_ppob = $request->input('harga_ppob');
        // $tpp->bayar_transaksi_ppob = $request->input('bayar_ppob');
        // $tpp->nomor_inputan = $request->input('nomor_inputan');

<<<<<<< HEAD


        // $tpp->save();



        // return redirect("/tpp")->with('success', 'Berhasil Update produk');
    }
=======
        // $tpp->save();

        // return redirect("/tpp")->with('success', 'Berhasil Update produk');
    }

>>>>>>> 0943348 (initial commit)
    public function deletetpp($id)
    {
        transaksippob::find($id)->delete();

<<<<<<< HEAD
        return redirect("/tpp")->with('success', 'Berhasil hapus transaksi produk');
    }
=======
        return redirect('/tpp')->with('success', 'Berhasil hapus transaksi produk');
    }

>>>>>>> 0943348 (initial commit)
    public function acctpp(Request $request, $id)
    {

        $tpp = transaksippob::find($id);
        $tpp->status_ppob = 'sedang diproses';

        $tpp->save();

<<<<<<< HEAD


        return redirect("/tpp")->with('success', 'Berhasil Update produk');
    }
=======
        return redirect('/tpp')->with('success', 'Berhasil Update produk');
    }

>>>>>>> 0943348 (initial commit)
    public function selesaitpp(Request $request, $id)
    {
        $tpp = transaksippob::find($id);
        $customerppob = Customer::find($tpp->customer_ppob);
<<<<<<< HEAD
        if ($customerppob->saldo_customer <  $tpp->bayar_transaksi_ppob) {
            $tpp->status_ppob = 'sedang diproses';

            $tpp->save();
            return redirect("/tpp")->with('warning', 'Saldo Tidak Mencukupi');
        }

=======
        if ($customerppob->saldo_customer < $tpp->bayar_transaksi_ppob) {
            $tpp->status_ppob = 'sedang diproses';

            $tpp->save();

            return redirect('/tpp')->with('warning', 'Saldo Tidak Mencukupi');
        }
>>>>>>> 0943348 (initial commit)

        $tpp->status_ppob = 'selesai';

        $tpp->save();

        $saldoawal = $customerppob->saldo_customer;
        $saldoppob = $tpp->bayar_transaksi_ppob;
        $saldoakhir = $saldoawal - $saldoppob;
        $customerppob->saldo_customer = $saldoakhir;
        $customerppob->save();

<<<<<<< HEAD
        return redirect("/tpp")->with('success', 'Berhasil Update produk');
    }
=======
        return redirect('/tpp')->with('success', 'Berhasil Update produk');
    }

>>>>>>> 0943348 (initial commit)
    public function ppob()
    {

        $tpp = transaksippob::all();

<<<<<<< HEAD


=======
>>>>>>> 0943348 (initial commit)
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

        return view('transaksippob.logtransaksippob')->with('tpp', $tpp);
    }
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
    public function export()
    {
        return Excel::download(new ppobexport, 'transaksippob.xlsx');
    }
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
    public function totalppob()
    {
        $asd = transaksippob::where('status_ppob', 'belum diproses')->count();
        echo json_encode($asd);
    }
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
    public function totalppobdiproses()
    {
        $asd = transaksippob::where('status_ppob', 'sedang diproses')->count();
        echo json_encode($asd);
    }
}
