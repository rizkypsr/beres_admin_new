<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> 0943348 (initial commit)
use App\Models\sosmed;

class SosmedapiController extends Controller
{
<<<<<<< HEAD
     public function indexwa(){
    $wa = sosmed::where('nama_sosmed','whatsapp')->get();
    return response()->json($wa);
}
public function indexte(){
    $te = sosmed::where('nama_sosmed','telegram')->get();
    return response()->json($te);
}
=======
    public function indexwa()
    {
        $wa = sosmed::where('nama_sosmed', 'whatsapp')->get();

        return response()->json($wa);
    }

    public function indexte()
    {
        $te = sosmed::where('nama_sosmed', 'telegram')->get();

        return response()->json($te);
    }
>>>>>>> 0943348 (initial commit)
}
