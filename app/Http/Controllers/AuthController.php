<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{

    public function authenticating(Request $request)
    {
        // dd('auth');
        $credentials = $request->validate([
            // 'email' => ['required|email|regex:/^.+@.+$/i'],
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$fieldType => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
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
                // Session::flash('status', 'failed');
                // Session::flash('message', 'Your account inactive please contact admin');
                // return redirect('/login');
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









    // protected function attemptLogin(Request $request)
    // {
    //     $email = $request->input('email');
    //     $password = $request->input('password');
    //     $username = $request->input('username');

    //     $credentials = $request->only('password');

    //     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         $credentials['email'] = $email;
    //     } else {
    //         $credentials['username'] = $username;
    //     }

    //     return Auth::attempt($credentials, $request->filled('remember'));
    // }
}
