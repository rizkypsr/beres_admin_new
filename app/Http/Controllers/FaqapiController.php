<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> 0943348 (initial commit)
use App\Models\faq;

class FaqapiController extends Controller
{
<<<<<<< HEAD
    public function index(){
        $faq = faq::all();
=======
    public function index()
    {
        $faq = faq::all();

>>>>>>> 0943348 (initial commit)
        return response()->json($faq);
    }
}
