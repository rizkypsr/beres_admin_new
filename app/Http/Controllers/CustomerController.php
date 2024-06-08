<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\kecamatan;
use App\Models\User;
use App\Models\topup;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\customerexport;

=======
use App\Exports\customerexport;
>>>>>>> 0943348 (initial commit)
use App\Exports\tokoexport;
use App\Imports\CustomerImport;
use App\Imports\TokoImport;
use App\Models\Customer;
<<<<<<< HEAD
=======
use App\Models\kecamatan;
use App\Models\topup;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
>>>>>>> 0943348 (initial commit)

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD
    public function index()
    {
        if (auth()->user()->role == "superadmin") {
            $customer = Customer::with('kecamatan')->where('role_customer', 'customer')->where('customer_is_delete', 0)->get();
            $kecamatan = kecamatan::where('status_kecamatan', 0)->get();
            return view('customer.customer')->with('customer', $customer)->with('kecamatan', $kecamatan);
        }
        if (auth()->user()->role == "admin") {
            $user = User::find(auth()->user()->id);
            $customer = Customer::with('kecamatan')->where('id_kecamatan_customer', $user->id_kecamatan_user)->where('role_customer', 'customer')->where('customer_is_delete', 0)->get();
            $kecamatan = kecamatan::where('id_kecamatan', $user->id_kecamatan_user)->get();
            return view('customer.customer')->with('customer', $customer)->with('kecamatan', $kecamatan);
        }


        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();


    }
=======

    public function index()
    {
        if (auth()->user()->role == 'superadmin') {
            $customer = Customer::with('kecamatan')->where('role_customer', 'customer')->where('customer_is_delete', 0)->get();
            $kecamatan = kecamatan::where('status_kecamatan', 0)->get();

            return view('customer.customer')->with('customer', $customer)->with('kecamatan', $kecamatan);
        }
        if (auth()->user()->role == 'admin') {
            $user = User::find(auth()->user()->id);
            $customer = Customer::with('kecamatan')->where('id_kecamatan_customer', $user->id_kecamatan_user)->where('role_customer', 'customer')->where('customer_is_delete', 0)->get();
            $kecamatan = kecamatan::where('id_kecamatan', $user->id_kecamatan_user)->get();

            return view('customer.customer')->with('customer', $customer)->with('kecamatan', $kecamatan);
        }

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

    }

>>>>>>> 0943348 (initial commit)
    public function addcustomer(Request $request)
    {
        // add validation

        try {
            $request->validate([
                'id_customer' => 'required|unique:customer',
                'id_kecamatan_customer' => 'required',
                'nama_customer' => 'required',
                'alamat_customer' => 'required',
                'saldo_customer' => 'required',
                'pin_customer' => 'required',
                'no_hp_customer' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
            ]);

            Customer::create([
                'id_customer' => $request->id_customer,
                'id_kecamatan_customer' => $request->id_kecamatan_customer,
                'nama' => $request->nama_customer,
                'alamat_customer' => $request->alamat_customer,
                'saldo_customer' => $request->saldo_customer,
                'pin_customer' => Hash::make($request->pin_customer),
                'no_hp_customer' => $request->no_hp_customer,
                'role_customer' => 'customer',
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'customer_is_delete' => 0,
            ]);

<<<<<<< HEAD
            return redirect("/customer")->with('success', 'Berhasil Menambahkan Customer');
        } catch (\Exception $e) {
            return redirect("/customer")->with('warning', 'Gagal Menambahkan Customer: ' . $e->getMessage());
=======
            return redirect('/customer')->with('success', 'Berhasil Menambahkan Customer');
        } catch (\Exception $e) {
            return redirect('/customer')->with('warning', 'Gagal Menambahkan Customer: '.$e->getMessage());
>>>>>>> 0943348 (initial commit)
        }

        // $cus = DB::table('customer')->where('customer_is_delete', '=', 1)->first();
        // if ($cus) {
        //     $cus = Customer::find($cus->id_customer);
        //     $cus->nama = $request->input('nama_customer');
        //     $cus->alamat_customer = $request->input('alamat_customer');
        //     $cus->saldo_customer = $request->input('saldo_customer');
        //     $cus->pin_customer = Hash::make($request->pin_customer);
        //     $cus->no_hp_customer = $request->input('no_hp_customer');
        //     $cus->role_customer = 'customer';
        //     $cus->customer_is_delete = 0;
        //     $cus->tempat_lahir = $request->input('tempat_lahir');
        //     $cus->tgl_lahir = $request->input('tgl_lahir');
        //     $cus->save();

        //     return redirect("/customer")->with('success', 'Berhasil Menambahkan Customer');
        // }

        // $customer = new customer;
        // if ($customer->customer_is_delete == 0) {
        //     if (customer::find($request->input('id_customer'))) {
        //         return redirect('/customer')->with('warning', 'Id anggota sudah tersedia');
        //     }
        // }
        // $customer->id_customer = $request->input('id_customer');
        // $customer->id_kecamatan_customer = $request->input('id_kecamatan_customer');
        // $customer->nama = $request->input('nama_customer');
        // $customer->alamat_customer = $request->input('alamat_customer');
        // $customer->saldo_customer = $request->input('saldo_customer');
        // $customer->pin_customer = Hash::make($request->pin_customer);
        // $customer->no_hp_customer = $request->input('no_hp_customer');
        // $customer->tempat_lahir = $request->input('tempat_lahir');
        // $customer->tgl_lahir = $request->input('tgl_lahir');
        // $customer->role_customer = 'customer';
        // $customer->save();

<<<<<<< HEAD
        return redirect("/customer")->with('success', 'Berhasil Menambahkan Customer');
=======
        return redirect('/customer')->with('success', 'Berhasil Menambahkan Customer');
>>>>>>> 0943348 (initial commit)
    }

    public function updatecustomer(Request $request, $id)
    {

        $customer = Customer::find($id);
<<<<<<< HEAD
        // $customer->id_customer = $request->input('id_customer'); 
=======
        // $customer->id_customer = $request->input('id_customer');
>>>>>>> 0943348 (initial commit)
        $customer->id_kecamatan_customer = $request->input('id_kecamatan_customer');
        $customer->nama = $request->input('nama_customer');
        $customer->alamat_customer = $request->input('alamat_customer');
        // $customer->saldo_customer = $request->input('saldo_customer');
        $customer->pin_customer = Hash::make($request->pin_customer);
        $customer->no_hp_customer = $request->input('no_hp_customer');
        $customer->role_customer = 'customer';
        $customer->tempat_lahir = $request->input('tempat_lahir');
        $customer->tgl_lahir = $request->input('tgl_lahir');
        $customer->save();

<<<<<<< HEAD
        return redirect("/customer")->with('success', 'Berhasil Update customer');
    }
=======
        return redirect('/customer')->with('success', 'Berhasil Update customer');
    }

>>>>>>> 0943348 (initial commit)
    public function deletecustomer($id)
    {
        $customer = customer::find($id);
        $customer->customer_is_delete = 1;
        $customer->save();

        $customer->delete();

<<<<<<< HEAD
        return redirect("/customer")->with('success', 'Berhasil menghapus customer');
    }
=======
        return redirect('/customer')->with('success', 'Berhasil menghapus customer');
    }

>>>>>>> 0943348 (initial commit)
    public function topupcustomer(Request $request, $id)
    {

        $customer = customer::find($id);

        $saldoawal = $customer->saldo_customer;
        $saldotopup = $request->input('saldo_customer');
        $saldoakhir = $saldoawal + $saldotopup;
        $customer->saldo_customer = $saldoakhir;
        $customer->save();

        $topup = new topup;
        $topup->nama_customer_topup = $customer->nama;
        $topup->id_kecamatan_topup = $customer->id_kecamatan_customer;
        $topup->tanggal_topup = Carbon::now()->format('Y-m-d');
        $topup->nominal_topup = $saldotopup;
        $topup->total_saldo_topup = $customer->saldo_customer;
        $topup->created_at = Carbon::now();
        $topup->save();

<<<<<<< HEAD
        return redirect("/customer")->with('success', 'Berhasil menambahkan saldo');
=======
        return redirect('/customer')->with('success', 'Berhasil menambahkan saldo');
>>>>>>> 0943348 (initial commit)
    }

    public function exportcustomer()
    {
        return Excel::download(new customerexport, 'customer.xlsx');
    }

    public function exporttoko()
    {
        return Excel::download(new tokoexport, 'toko.xlsx');
    }

    public function import(Request $request)
    {
        // only xlsx, xls, csv file allowed
        $request->validate([
<<<<<<< HEAD
            'file' => 'required|mimes:xlsx,xls,csv'
=======
            'file' => 'required|mimes:xlsx,xls,csv',
>>>>>>> 0943348 (initial commit)
        ]);

        Excel::import(new CustomerImport, request()->file('file'));

        return redirect('/customer')->with('success', 'Berhasil Menambahkan Customer');
    }

    public function importtoko(Request $request)
    {
        // only xlsx, xls, csv file allowed
        $request->validate([
<<<<<<< HEAD
            'file' => 'required|mimes:xlsx,xls,csv'
=======
            'file' => 'required|mimes:xlsx,xls,csv',
>>>>>>> 0943348 (initial commit)
        ]);

        Excel::import(new TokoImport, request()->file('file'));

        return redirect('/toko')->with('success', 'Berhasil Menambahkan Toko');
    }
}
