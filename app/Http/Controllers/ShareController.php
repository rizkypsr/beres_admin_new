<?php

namespace App\Http\Controllers;

use App\Models\share;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
}
