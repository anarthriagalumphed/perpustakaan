<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class BookRentController extends Controller
{
    public function book_rent()
    {
        $users = User::where('id', '!=', 1)->get();
        $books = Book::all();
        return view('book_rent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] =  Carbon::now()->addDay(7)->toDateString();


        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            Session::flash('message', 'Book Not Available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book_rent');
        } else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();
            if ($count >= 2) {
                Session::flash('message', 'User Not Return Book yet');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book_rent');
            } else {
                try {
                    DB::beginTransaction();
                    //proses insert ke rent log table//
                    RentLogs::create($request->all());
                    //proses update ke book table//
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();
                    Session::flash('message', 'Book Available');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('book_rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function book_return()
    {
        $users = User::where('id', '!=', 1)->get();
        $books = Book::all();
        return view('book_return', ['users' => $users, 'books' => $books]);
    }


    public function returning(Request $request)
    {
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();
        if ($countData == 1) {
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            $book = Book::findOrFail($request->book_id);
            $book->status = 'in stock';
            $book->save();

            Session::flash('message', 'Book Returned');
            Session::flash('alert-class', 'alert-success');
            return redirect('book_return');
        } else {
            Session::flash('message', 'Book Not Returned');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book_return');
        }
    }

    public function selectState(Request $request)
{
    $books = [];
    $userID = $request->userID;

    if ($request->has('q')) {
        $search = $request->q;
        $books = RentLogs::select('books.id', 'books.title', 'books.book_code')
            ->join('books', 'rent_logs.book_id', '=', 'books.id')
            ->where('rent_logs.user_id', $userID)
            ->where('books.title', 'LIKE', "%$search%")
            ->get();
    } else {
        $books = RentLogs::select('books.id', 'books.title', 'books.book_code')
            ->join('books', 'rent_logs.book_id', '=', 'books.id')
            ->where('rent_logs.user_id', $userID)
            ->limit(10)
            ->get();
    }

    return response()->json($books);
}

}
