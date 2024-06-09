<?php

namespace App\Http\Controllers;

use App\Models\banner;

class apibannerController extends Controller
{
    public function index()
    {
        $banner = banner::all();

        return response()->json([
            'status' => 'success',
            'msg' => 'data banner',
            'data' => $banner,
        ]);
    }
}
