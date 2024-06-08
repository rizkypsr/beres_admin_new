<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ppob;
class apippobController extends Controller
{
    public function index(){
        
            $ppob = ppob::where('ppob_is_delete',0)->get();
            // return view('ppob.ppob')->with('ppob',$ppob);
            return response()->json([
                'status' => 'success',
                'message' => 'data ppob',
                'data' => $ppob,
            ]);
        
      
=======
use App\Models\ppob;

class apippobController extends Controller
{
    public function index()
    {

        $ppob = ppob::where('ppob_is_delete', 0)->get();

        // return view('ppob.ppob')->with('ppob',$ppob);
        return response()->json([
            'status' => 'success',
            'message' => 'data ppob',
            'data' => $ppob,
        ]);

>>>>>>> 0943348 (initial commit)
    }
}
