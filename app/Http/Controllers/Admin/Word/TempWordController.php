<?php

namespace App\Http\Controllers\Admin\Word;

use App\Http\Controllers\Controller;
use App\Models\TempWord;

class TempWordController extends Controller
{
    public function index()
    {
        return view('word.temp-index');
    }
}
