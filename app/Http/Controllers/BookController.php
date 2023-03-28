<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $data = Book::all();

        return view('databuku', compact('data'));
    }

    public function addbuku()
    {
        return view('addata');
    }


    public function insertdata(Request $request)
    {
        // dd($request->all());
        Book::create($request->all());
        return redirect()->route('buku');
    }
}
