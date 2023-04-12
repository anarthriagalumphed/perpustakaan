<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // kasih tau apa yang terjadi jika bukan 1
        if (auth()->check() && auth()->user()->role_id == 1) {
            return $next($request);
            return redirect('dashboard');
        } else {
            return redirect()->route('book_list')->with('error', 'Anda tidak memiliki akses ke halaman ini, silahkan register atau login terlebih dahulu');
        }
    }

    // jika admin login

}
