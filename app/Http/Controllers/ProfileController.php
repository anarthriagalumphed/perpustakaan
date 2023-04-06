<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {

        // dd('ini halaman profile');
        return view('profile');
    }
}
