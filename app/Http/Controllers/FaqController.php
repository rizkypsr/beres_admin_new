<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\faq;
=======
use App\Models\faq;
use Illuminate\Http\Request;
>>>>>>> 0943348 (initial commit)

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD
    public function index(){
        $faq = faq::all();
        return view('faq.faq')->with('faq',$faq);
    }
    public function addfaq(Request $request)
    {
   
=======

    public function index()
    {
        $faq = faq::all();

        return view('faq.faq')->with('faq', $faq);
    }

    public function addfaq(Request $request)
    {

>>>>>>> 0943348 (initial commit)
        $faq = new faq;
        $faq->judul_faq = $request->input('judul_faq');
        $faq->deskripsi_faq = $request->input('deskripsi_faq');
        $faq->save();
<<<<<<< HEAD
        
        return redirect('/faq')->with('success', 'Berhasil Menambahkan faq');
    }
    public function updatefaq(Request $request, $id)
    {
   
=======

        return redirect('/faq')->with('success', 'Berhasil Menambahkan faq');
    }

    public function updatefaq(Request $request, $id)
    {

>>>>>>> 0943348 (initial commit)
        $faq = faq::find($id);
        $faq->judul_faq = $request->input('judul_faq');
        $faq->deskripsi_faq = $request->input('deskripsi_faq');
        $faq->save();
<<<<<<< HEAD
        
        return redirect('/faq')->with('success', 'Berhasil update faq');
    }
    public function deletefaq(Request $request, $id)
    {
   
        $faq = faq::find($id);
        
        $faq->delete();
        
=======

        return redirect('/faq')->with('success', 'Berhasil update faq');
    }

    public function deletefaq(Request $request, $id)
    {

        $faq = faq::find($id);

        $faq->delete();

>>>>>>> 0943348 (initial commit)
        return redirect('/faq')->with('success', 'Berhasil Delete faq');
    }
}
