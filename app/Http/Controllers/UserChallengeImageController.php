<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\UserChallenge;
=======
>>>>>>> 0943348 (initial commit)
use App\Models\UserChallengeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserChallengeImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userChallengeId = $request->query('user_challenge_id');

        if ($userChallengeId) {
            $userChallengeImage = UserChallengeImage::with(['user_challenge.customer'])->where('user_challenge_id', $userChallengeId)->get();
        } else {
            $userChallengeImage = [];
        }

        return view('challenge.user-challenges.images.index', compact('userChallengeImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        try {
            $userChallengeImage = UserChallengeImage::findOrFail($id);

<<<<<<< HEAD
            Storage::disk('public')->delete('user-challenges/images/' . $userChallengeImage->image);
=======
            Storage::disk('public')->delete('user-challenges/images/'.$userChallengeImage->image);
>>>>>>> 0943348 (initial commit)

            $userChallengeImage->delete();

            return redirect()->route('user-challenge-image.index')->with('success', 'Gambar berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('user-challenge-image.index')->with('error', 'Gambar gagal dihapus');
        }
    }
}
