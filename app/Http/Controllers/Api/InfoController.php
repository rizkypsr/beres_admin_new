<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('limit', 10);
        $page = $request->input('page', 1);

        $info = info::paginate($perPage, ['*'], 'page', $page);

        $info->getCollection()->transform(function ($inf) {
<<<<<<< HEAD
            $inf->gambar_info = url('images/info/' . $inf->gambar_info);
=======
            $inf->gambar_info = url('images/info/'.$inf->gambar_info);

>>>>>>> 0943348 (initial commit)
            return $inf;
        });

        $data = [
            'currentPage' => $info->currentPage(),
            'limit' => $info->perPage(),
            'total' => $info->total(),
            'data' => $info->items(),
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Http\Request  $request
=======
>>>>>>> 0943348 (initial commit)
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Http\Request  $request
=======
>>>>>>> 0943348 (initial commit)
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
