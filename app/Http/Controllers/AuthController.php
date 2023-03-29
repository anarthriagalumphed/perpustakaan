<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
                // return redirect('login')->with('status', 'Your account inactive please contact admin');
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account inactive please contact admin');
                return redirect('/login');
            }
            // $request->session()->regenerate();
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
}
