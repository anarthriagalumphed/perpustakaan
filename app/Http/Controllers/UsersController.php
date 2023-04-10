<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function users()
    {

        $users = User::where('role_id', 2)->where('status', 'active')->get();
        // dd('ini halaman profile');
        return view('users', ['users' => $users]);
    }


    public function registered_users()
    {

        $registeredUser = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('registered_users', ['registeredUsers' => $registeredUser]);
    }


    public function detail_users($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('detail_users', ['user' => $user]);
    }



    public function approve_users($slug)
    {

        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('/detail_users/' . $slug)->with('status', 'user active');
    }

    public function delete_users($slug)
    {

        $user = User::where('slug', $slug)->first();
        return view('delete_users', ['user' => $user]);
    }


    public function destroy_users($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('status', 'user deleted');
    }

    public function deleted_users()
    {
        $deletedUsers = User::onlyTrashed()->get();
        return view('deleted_users', ['deletedUsers' => $deletedUsers]);
    }



    public function restore_users($slug)
    {


        $category = User::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('users')->with('status', 'Users Unbanned');
    }
}
