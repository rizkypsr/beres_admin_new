<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\qurbansampah;
use Illuminate\Support\Facades\Validator;


=======
use App\Models\qurbansampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

>>>>>>> 0943348 (initial commit)
class QurbansampahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $qurban = qurbansampah::all();

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

        return view('qurbansampah.qurbansampah')->with('qurban', $qurban);
    }
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
    public function addqurban(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'gambar_qurban' => 'max:2000',

<<<<<<< HEAD



=======
>>>>>>> 0943348 (initial commit)
        ]);
        if ($validation->fails()) {
            return redirect('/qurban')->with('warning', 'Ukuran gambar terlalu besar');
        }
        $fileextension = $request->file('gambar_qurban')->getClientOriginalExtension();
<<<<<<< HEAD
        $filename = time() . "." . $fileextension;
=======
        $filename = time().'.'.$fileextension;
>>>>>>> 0943348 (initial commit)
        $request->file('gambar_qurban')->move(public_path('/uploadqurban'), $filename);

        $qurban = new qurbansampah;
        $qurban->nama_qurban = $request->input('nama_qurban');
        $qurban->gambar_qurban = asset("uploadqurban/$filename");
        $qurban->deskripsi_qurban = $request->input('deskripsi_qurban');
        $qurban->nama_qurban = $request->input('nama_qurban');
        $qurban->save();

<<<<<<< HEAD
        return redirect("/qurban")->with('success', 'Berhasil Menambahkan qurban');
    }
=======
        return redirect('/qurban')->with('success', 'Berhasil Menambahkan qurban');
    }

>>>>>>> 0943348 (initial commit)
    public function updatequrban(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'gambar_qurban' => 'max:2000',

<<<<<<< HEAD



=======
>>>>>>> 0943348 (initial commit)
        ]);
        if ($validation->fails()) {
            return redirect('/qurban')->with('warning', 'Ukuran gambar terlalu besar');
        }
        if ($request->file('gambar_qurban')) {
            $fileextension = $request->file('gambar_qurban')->getClientOriginalExtension();
<<<<<<< HEAD
            $filename = time() . "." . $fileextension;
=======
            $filename = time().'.'.$fileextension;
>>>>>>> 0943348 (initial commit)
            $request->file('gambar_qurban')->move(public_path('/uploadqurban'), $filename);

            $qurban = qurbansampah::find($id);
            $qurban->nama_qurban = $request->input('nama_qurban');
            $qurban->gambar_qurban = asset("uploadqurban/$filename");
            $qurban->deskripsi_qurban = $request->input('deskripsi_qurban');
            $qurban->nama_qurban = $request->input('nama_qurban');
            $qurban->save();
        } else {
            $qurban = qurbansampah::find($id);
            $qurban->nama_qurban = $request->input('nama_qurban');

            $qurban->deskripsi_qurban = $request->input('deskripsi_qurban');
            $qurban->nama_qurban = $request->input('nama_qurban');
            $qurban->save();
        }

<<<<<<< HEAD

        return redirect("/qurban")->with('success', 'Berhasil Update qurban');
    }
=======
        return redirect('/qurban')->with('success', 'Berhasil Update qurban');
    }

>>>>>>> 0943348 (initial commit)
    public function deletequrban($id)
    {
        qurbansampah::find($id)->delete();

<<<<<<< HEAD
        return redirect("/qurban")->with('success', 'Berhasil Update qurban');
=======
        return redirect('/qurban')->with('success', 'Berhasil Update qurban');
>>>>>>> 0943348 (initial commit)
    }
}
