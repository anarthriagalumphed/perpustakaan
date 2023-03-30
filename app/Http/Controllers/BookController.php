<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        // dd('ini halaman buku');
        return view('books');
    }





    // flush data login
    // public function index(Request $request)
    // {
    //     $request->session()->flush();
    // }
}
