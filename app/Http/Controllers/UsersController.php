<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function users()
    {

        // dd('ini halaman profile');
        return view('users');
    }
}
