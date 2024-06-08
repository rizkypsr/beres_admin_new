<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\info;
use Illuminate\Support\Facades\Validator;


class InfoController extends Controller
{

=======
use App\Models\info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
>>>>>>> 0943348 (initial commit)
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
    public function index()
    {

        $info = info::all();

<<<<<<< HEAD

        return view('info.info')->with('info', $info);
    }
=======
        return view('info.info')->with('info', $info);
    }

>>>>>>> 0943348 (initial commit)
    public function addinfo(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'gambar_info' => 'max:2000',
        ]);

        if ($validation->fails()) {
            return redirect('/info')->with('warning', 'Ukuran gambar terlalu besar');
        }

        if ($request->hasFile('gambar_info')) {
            $image = $request->file('gambar_info');

<<<<<<< HEAD
            $imageName = time() . '_' . substr($image->getClientOriginalName(), 0, 50) . '.' . $image->getClientOriginalExtension();
=======
            $imageName = time().'_'.substr($image->getClientOriginalName(), 0, 50).'.'.$image->getClientOriginalExtension();
>>>>>>> 0943348 (initial commit)
            $image->storeAs('info', $imageName, 'public');
        }

        $info = Info::create([
            'gambar_info' => $imageName,
        ]);

<<<<<<< HEAD
        return redirect("/info")->with('success', 'Berhasil Menambahkan Info');
=======
        return redirect('/info')->with('success', 'Berhasil Menambahkan Info');
>>>>>>> 0943348 (initial commit)
    }

    public function updateinfo(Request $request, $id)
    {

        $fileextension = $request->file('gambar_info')->getClientOriginalExtension();
<<<<<<< HEAD
        $filename = time() . "." . $fileextension;
=======
        $filename = time().'.'.$fileextension;
>>>>>>> 0943348 (initial commit)
        $request->file('gambar_info')->move(public_path('/uploadinfo'), $filename);

        $info = info::find($id);

        $info->gambar_info = asset("uploadinfo/$filename");
        $info->save();

<<<<<<< HEAD




        return redirect("/info")->with('success', 'Berhasil Update info');
    }
=======
        return redirect('/info')->with('success', 'Berhasil Update info');
    }

>>>>>>> 0943348 (initial commit)
    public function deleteinfo($id)
    {
        info::find($id)->delete();

<<<<<<< HEAD
        return redirect("/info")->with('success', 'Berhasil Delete info');
=======
        return redirect('/info')->with('success', 'Berhasil Delete info');
>>>>>>> 0943348 (initial commit)
    }
}
