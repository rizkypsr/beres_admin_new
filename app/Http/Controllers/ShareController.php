<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\share;
=======
use App\Models\share;
use Illuminate\Http\Request;
>>>>>>> 0943348 (initial commit)

class ShareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD
    public function index(){
        
        $share = share::all();
        

        return view('share.share')->with('share',$share);
    }
    public function accshare(Request $request,$id)
    {
       
        $share = share::find($id);
        $share->status_share = 'selesai'; 
        
        $share->save();
        
        
        
        return redirect("/share")->with('success', 'Berhasil Update status');
    }

=======

    public function index()
    {

        $share = share::all();

        return view('share.share')->with('share', $share);
    }

    public function accshare(Request $request, $id)
    {

        $share = share::find($id);
        $share->status_share = 'selesai';

        $share->save();

        return redirect('/share')->with('success', 'Berhasil Update status');
    }
>>>>>>> 0943348 (initial commit)
}
