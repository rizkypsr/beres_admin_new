<?php

namespace App\Http\Controllers;

use App\Models\faq;

class FaqapiController extends Controller
{
    public function index()
    {
        $faq = faq::all();

        return response()->json($faq);
    }
}
