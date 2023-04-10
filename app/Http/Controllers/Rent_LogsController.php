<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Rent_LogsController extends Controller
{
    public function rent_logs()
    {

        // dd('ini halaman profile');
        return view('rent_logs');
    }
}
