<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\detailppob;
use App\Models\ppob;
=======
use App\Models\detailppob;
use App\Models\ppob;
use Illuminate\Http\Request;
>>>>>>> 0943348 (initial commit)

class DetailppobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD
    public function index(){
        
        $detailppob = detailppob::with('ppob')->where('detailppob_is_delete',0)->get();
        $ppob = ppob::where('ppob_is_delete',0)->get();
       
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();
        
        return view('detailppob.detailppob')->with('detailppob',$detailppob)->with('ppob',$ppob);
    }
=======

    public function index()
    {

        $detailppob = detailppob::with('ppob')->where('detailppob_is_delete', 0)->get();
        $ppob = ppob::where('ppob_is_delete', 0)->get();

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

        return view('detailppob.detailppob')->with('detailppob', $detailppob)->with('ppob', $ppob);
    }

>>>>>>> 0943348 (initial commit)
    public function adddetailppob(Request $request)
    {
        // $fileextension = $request->file('gambar_detailppob')->getClientOriginalExtension();
        // $filename = time().".". $fileextension;
<<<<<<< HEAD
        // $request->file('gambar_detailppob')->move(public_path('/uploaddetailppob'), $filename); 
        
=======
        // $request->file('gambar_detailppob')->move(public_path('/uploaddetailppob'), $filename);

>>>>>>> 0943348 (initial commit)
        $detailppob = new detailppob;
        $detailppob->id_ppob_detail = $request->input('id_ppob_detail');
        // $detailppob->gambar_detailppob = asset("uploaddetailppob/$filename");
        $detailppob->harga_detailppob = $request->input('harga_detailppob');
        $detailppob->bayar_detailppob = $request->input('bayar_detailppob');
        $detailppob->save();
<<<<<<< HEAD
        
        return redirect("/detailppob")->with('success', 'Berhasil Menambahkan PPOB');
    }
    public function updatedetailppob(Request $request,$id)
=======

        return redirect('/detailppob')->with('success', 'Berhasil Menambahkan PPOB');
    }

    public function updatedetailppob(Request $request, $id)
>>>>>>> 0943348 (initial commit)
    {
        // if ($request->file('gambar_detailppob')) {
        //     $fileextension = $request->file('gambar_detailppob')->getClientOriginalExtension();
        //     $filename = time().".". $fileextension;
<<<<<<< HEAD
        //     $request->file('gambar_detailppob')->move(public_path('/uploaddetailppob'), $filename); 
            
        
=======
        //     $request->file('gambar_detailppob')->move(public_path('/uploaddetailppob'), $filename);

>>>>>>> 0943348 (initial commit)
        $detailppob = detailppob::find($id);
        $detailppob->id_ppob_detail = $request->input('id_ppob_detail');
        // $detailppob->gambar_detailppob = asset("uploaddetailppob/$filename");
        $detailppob->harga_detailppob = $request->input('harga_detailppob');
        $detailppob->bayar_detailppob = $request->input('bayar_detailppob');
        $detailppob->save();
<<<<<<< HEAD
        
     
=======

>>>>>>> 0943348 (initial commit)
        // }else {
        //     $detailppob = detailppob::find($id);
        //     $detailppob->id_ppob_detail = $request->input('id_ppob_detail');
        //     $detailppob->harga_detailppob = $request->input('harga_detailppob');
        //     $detailppob->bayar_detailppob = $request->input('bayar_detailppob');
        //     $detailppob->save();
<<<<<<< HEAD
      
        // }
        
        
        return redirect("/detailppob")->with('success', 'Berhasil Update ppob');
    }
    public function deletedetailppob($id)
    {
     $detailppob = detailppob::find($id);
     $detailppob->detailppob_is_delete = 1;
     $detailppob->save();
        
        return redirect("/detailppob")->with('success', 'Berhasil Update ppob');
=======

        // }

        return redirect('/detailppob')->with('success', 'Berhasil Update ppob');
    }

    public function deletedetailppob($id)
    {
        $detailppob = detailppob::find($id);
        $detailppob->detailppob_is_delete = 1;
        $detailppob->save();

        return redirect('/detailppob')->with('success', 'Berhasil Update ppob');
>>>>>>> 0943348 (initial commit)
    }
}
