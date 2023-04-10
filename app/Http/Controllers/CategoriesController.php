<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        // dd('ini halaman profile');
        return view('categories', ['category' => $categories]);
    }


    public function add_category(REQUEST $request)
    {
        return view('add_category');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);


        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'category added');
    }



    public function edit_category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('edit_category', ['category' => $category]);
    }







    public function update_category(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);
        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'category updated');
    }

















    public function delete_category($slug)

    {
        $category = Category::where('slug', $slug)->first();
        return view('delete_category', ['category' => $category]);
    }


    public function destroy_category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $category->delete();
        return redirect('categories')->with('status', 'category deleted');
    }


    public function deleted_category()
    {

        $deletedCategories = Category::onlyTrashed()->get();
        return view('deleted_category', ['deletedCategories' => $deletedCategories]);
    }









    public function restore_category($slug)
    {


        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'category restored');
    }
}
