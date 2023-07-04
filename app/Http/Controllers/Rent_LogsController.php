<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;

class Rent_LogsController extends Controller
{
    public function rent_logs()
    {

        // dd('ini halaman profile');
        $rentlogs = RentLogs::with(['user', 'book'])->get();
        return view('rent_logs', ['rent_logs' => $rentlogs]);
    }
}
