<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\banner;


=======
use App\Models\banner;

>>>>>>> 0943348 (initial commit)
class apibannerController extends Controller
{
    public function index()
    {
        $banner = banner::all();
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
        return response()->json([
            'status' => 'success',
            'msg' => 'data banner',
            'data' => $banner,
        ]);
    }
}
