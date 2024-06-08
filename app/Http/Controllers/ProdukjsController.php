<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\produkjs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdukjsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        if (auth()->user()->role == 'superadmin') {
            $produkjs = produkjs::where('js_is_delete', 0)
                ->whereHas('kecamatan', function ($query) {
                    $query->where('status_kecamatan', 0);
                })
                ->with('kecamatan')
                ->get();

            $kecamatan = kecamatan::where('status_kecamatan', 0)->whereHas('kota', function ($query) {
                $query->where('kota_is_delete', 0);
            })->get();
        }
        if (auth()->user()->role == 'admin') {
            $produkjs = produkjs::where('js_is_delete', 0)
                ->with('kecamatan')
                ->where('id_kecamatan', auth()->user()->id_kecamatan_user)
                ->get();

            $kecamatan = kecamatan::where('status_kecamatan', 0)->where('id_kecamatan', auth()->user()->id_kecamatan_user)->get();
        }

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

        return view('produkjs.produkjs')
            ->with('produkjs', $produkjs)
            ->with('kecamatan', $kecamatan);
    }

    public function addprodukjs(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'gambar_js' => 'max:2000',

        ]);

        if ($validation->fails()) {
            return redirect('/produkjs')->with('warning', 'Ukuran gambar terlalu besar');
        }

        $image = $request->file('gambar_js');
        $filename = time().'.'.$image->getClientOriginalExtension();

        $image->storeAs('uploadprodukjs', $filename, 'public');

        produkjs::create([
            'id_kecamatan' => $request->id_kecamatan,
            'gambar_js' => $filename,
            'judul_js' => $request->judul_js,
            'deskripsi_js' => $request->deskripsi_js,
            'harga_js' => $request->harga_js,
            'satuan_js' => $request->satuan_js,
        ]);

        return redirect('/produkjs')->with('success', 'Berhasil Menambahkan produk jual sampah');
    }

    public function updateprodukjs(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'gambar_js' => 'max:2000',
        ]);

        if ($validation->fails()) {
            return redirect('/produkjs')->with('warning', 'Ukuran gambar terlalu besar');
        }

        $produkjs = produkjs::find($id);

        if ($request->file('gambar_js')) {
            $image = $request->file('gambar_js');
            $filename = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('uploadprodukjs', $filename, 'public');

            $oldpath = 'uploadprodukjs/'.$produkjs->gambar_js;

            $produkjs->update([
                'id_kecamatan' => $request->id_kecamatan,
                'gambar_js' => $filename,
                'judul_js' => $request->judul_js,
                'deskripsi_js' => $request->deskripsi_js,
                'harga_js' => $request->harga_js,
                'satuan_js' => $request->satuan_js,
            ]);

            if (Storage::disk('public')->exists($oldpath)) {
                Storage::disk('public')->delete($oldpath);
            }

        } else {
            $produkjs->update([
                'id_kecamatan' => $request->id_kecamatan,
                'judul_js' => $request->judul_js,
                'deskripsi_js' => $request->deskripsi_js,
                'harga_js' => $request->harga_js,
                'satuan_js' => $request->satuan_js,
            ]);
        }

        return redirect('/produkjs')->with('success', 'Berhasil Update produk');
    }

    public function deleteprodukjs($id)
    {
        $js = produkjs::find($id);
        $js->js_is_delete = 1;
        $js->save();

        return redirect('/produkjs')->with('success', 'Berhasil Update produk');
    }
}
