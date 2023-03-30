<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }



    public function authenticating(Request $request)
    {
        // dd('auth');
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // cek login falid
        // cek user status aktif?
        if (Auth::attempt($credentials)) {
            // cek user status aktif?
            if (Auth::user()->status != 'active') {
                // fungsi ini digunakan untuk me logout walaupun sudah register

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                // return redirect('login')->with('status', 'Your account inactive please contact admin');
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account inactive please contact admin');
                return redirect('/login');
            }

            // untuk meregenerate status
            $request->session()->regenerate();
            // dd(Auth::user());
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('profile');
            }
            // return redirect('')->intendeed('dashboard');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid');
        return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }


    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|unique:users|max:255',
            'phone' => 'max:12',
            'address' => 'required',

        ]);

        $request['password'] = Hash::make($request['password']);

        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'register success');
        return redirect('register');


        // dd($request->password);
    }
}
