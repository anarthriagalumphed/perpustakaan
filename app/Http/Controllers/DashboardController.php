<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // dd('dashboard index');
        $bookcount = Book::count();
        $categorycount = Category::count();
        $usercount = User::count();
        $rentlogs = RentLogs::with(['user', 'book'])->get();
        return view('dashboard', ['book_count' => $bookcount, 'category_count' => $categorycount, 'user_count' => $usercount , 'rent_logs' => $rentlogs]);
    }
}
