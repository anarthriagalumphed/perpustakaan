<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class BookController extends Controller
{
    public function books()
    {


        $books = Book::all();
        // dd('ini halaman buku');
        return view('books', ['books' => $books]);
    }





    // flush data login
    // public function index(Request $request)
    // {
    //     $request->session()->flush();
    // }


    public function add_books()
    {
        $categories = Category::all();
        return view('add_books', ['categories' => $categories]);
    }




    public function store(Request $request)
    {
        $book_code = 'gmp-' . $request->book_code;
        // dd($request->all);
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:100',
            'title' => 'required|max:255'
        ]);
        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '-' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }



        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status', 'book added');
    }







    public function edit_books($slug)
    {

        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('edit_books', ['categories' => $categories, 'book' => $book]);
    }

    public function update_books(Request $request, $slug)
    {


        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '-' . $extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }


        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());


        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }

        return redirect('books')->with('status', 'book updated');
    }




    public function delete_books($slug)
    {
        $book = Book::where('slug', $slug)->first();
        return view('delete_books', ['book' => $book]);
    }


    public function destroy_books($slug)
    {
        $book = Book::where('slug', $slug)->first();

        $book->delete();
        return redirect('books')->with('status', 'category deleted');
    }


    public function deleted_books()
    {
        $deletedBooks = Book::onlyTrashed()->get();
        return view('deleted_books', ['deletedBooks' => $deletedBooks]);
    }


    public function restore_books($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('books')->with('status', 'book restored');
    }
}
