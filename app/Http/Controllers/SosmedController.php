<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\sosmed;
=======
use App\Models\sosmed;
use Illuminate\Http\Request;
>>>>>>> 0943348 (initial commit)

class SosmedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD
    public function indexwa(){
        $wa = sosmed::where('nama_sosmed','whatsapp')->get();
        return view('sosmed.sosmedwa')->with('wa',$wa);
    }
    public function indexte(){
        $te = sosmed::where('nama_sosmed','telegram')->get();
        return view('sosmed.sosmedte')->with('te',$te);
    }
    public function updatesosmed(Request $request, $id)
    {
   
        $wa = sosmed::find($id);
        $wa->deskripsi_sosmed = $request->input('deskripsi_sosmed');
        $wa->save();
        
        return redirect('/wa')->with('success', 'Berhasil update whatsapp');
    }
    public function updatesosmedte(Request $request, $id)
    {
   
        $te = sosmed::find($id);
        $te->deskripsi_sosmed = $request->input('deskripsi_sosmed');
        $te->save();
        
=======

    public function indexwa()
    {
        $wa = sosmed::where('nama_sosmed', 'whatsapp')->get();

        return view('sosmed.sosmedwa')->with('wa', $wa);
    }

    public function indexte()
    {
        $te = sosmed::where('nama_sosmed', 'telegram')->get();

        return view('sosmed.sosmedte')->with('te', $te);
    }

    public function updatesosmed(Request $request, $id)
    {

        $wa = sosmed::find($id);
        $wa->deskripsi_sosmed = $request->input('deskripsi_sosmed');
        $wa->save();

        return redirect('/wa')->with('success', 'Berhasil update whatsapp');
    }

    public function updatesosmedte(Request $request, $id)
    {

        $te = sosmed::find($id);
        $te->deskripsi_sosmed = $request->input('deskripsi_sosmed');
        $te->save();

>>>>>>> 0943348 (initial commit)
        return redirect('/te')->with('success', 'Berhasil update telegram');
    }
}
