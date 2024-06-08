<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\challenges;
use App\Models\Customer;
use App\Models\elearning;
<<<<<<< HEAD
use App\Models\toko;
=======
>>>>>>> 0943348 (initial commit)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
<<<<<<< HEAD
use Illuminate\Validation\ValidationException;
=======
>>>>>>> 0943348 (initial commit)

class EnvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        $customMessages = [
            'judul.required' => 'Judul wajib diisi!',
            'subjudul.required' => 'Sub Judul wajib diisi!',
            'deskripsi.required' => 'Deskripsi wajib diisi!',
            'link.required' => 'Video wajib diupload!',
            'link.file' => 'File yang diupload harus berupa video.',
            'link.mimes' => 'Format video tidak valid. Pilih format mp4, mov, atau avi.',
            'link.max' => 'Ukuran video maksimal 20MB.',
            'point.integer' => 'Point harus berupa angka.',
            'status.in' => 'Status tidak valid.',
            'user_id.required' => 'User ID wajib diisi.',
            'user_type.required' => 'User Type wajib diisi.',
            'challenge_id.required' => 'Challenge ID wajib diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'subjudul' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'link' => 'required|file|mimes:mp4,mov,avi|max:20480', // 20MB in kilobytes (1MB = 1024KB)
            'point' => 'integer',
            'status' => 'in:-1,0,1',
            'user_id' => 'required',
            'user_type' => 'required',
<<<<<<< HEAD
            'challenge_id' => 'required'
=======
            'challenge_id' => 'required',
>>>>>>> 0943348 (initial commit)
        ], $customMessages);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
            return response()->json(['error' => 'Pastikan semua data terisi dengan benar dan lengkap', 'details' => $errors], 422);
        }

        $challenge = challenges::find($request->challenge_id);

<<<<<<< HEAD
        if (!$challenge) {
=======
        if (! $challenge) {
>>>>>>> 0943348 (initial commit)
            return response()->json(['error' => 'Challenge not found'], 404);
        }

        $videoPath = $request->file('link')->store('elearnings', 'public');

        $elearning = new elearning([
            'judul' => $request->input('judul'),
            'subjudul' => $request->input('subjudul'),
            'deskripsi' => $request->input('deskripsi'),
            'link' => $videoPath,
            'point' => $request->input('point', 0) + $challenge->point,
<<<<<<< HEAD
            'status' => $request->input('status', "-1"),
=======
            'status' => $request->input('status', '-1'),
>>>>>>> 0943348 (initial commit)
            'user_id' => $request->input('user_id'),
            'user_type' => $request->input('user_type'),
            'challenge_id' => $request->input('challenge_id'),
        ]);

        try {
            $elearning->save();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menyimpan data', 'details' => $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Selamat! Anda berhasil mengikuti challenge'], 201);
    }

<<<<<<< HEAD

=======
>>>>>>> 0943348 (initial commit)
    // $user = Auth::user();

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

    public function checkPinValidity(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'pin' => 'required|string',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
            return response()->json(['error' => 'Pastikan semua data terisi dengan benar dan lengkap', 'details' => $errors], 422);
        }

        $id = $request->input('user_id');
        $pin = $request->input('pin');

        $customer = Customer::find($id);

        if ($customer && Hash::check($pin, $customer->pin_customer)) {
            return response()->json(['valid' => true, 'user_id' => $id, 'user_type' => $customer->role_customer]);
        }

<<<<<<< HEAD
        return response()->json(['valid' => false, 'message' => 'ID dan Pin tidak valid!',]);
=======
        return response()->json(['valid' => false, 'message' => 'ID dan Pin tidak valid!']);
>>>>>>> 0943348 (initial commit)
    }
}
