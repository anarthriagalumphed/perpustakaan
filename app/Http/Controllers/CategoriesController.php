<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories()
    {

        // dd('ini halaman profile');
        return view('categories');
    }
}
