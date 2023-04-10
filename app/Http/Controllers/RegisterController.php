<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255|regex:/^.+@.+\..+$/',
            'password' => 'required|unique:users|max:255',

            // 'email' => 'required|unique:users|max:255|contains:@',
        ]);

        $request['password'] = Hash::make($request['password']);

        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'register success');
        return redirect('login');


        // dd($request->password);
    }
}
