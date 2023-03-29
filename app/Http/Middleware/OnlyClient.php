<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Auth;
// use Symfony\Component\HttpFoundation\Response;


// class OnlyClient
{
    /**
     * Handle an incoming request.
    //  *
    //  * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    //  */
    // public function handle(Request $request, Closure $next): Response
    {

        // fungsi ini dijalankan dari routes web apabila ingin admin tidak dapat mengakases profile


        // if (Auth::user()->role_id != 2 || Auth::user()->role_id != 1) {
        //     return redirect('books');
        // }
        // return $next($request);




        //  true only client
        // if (Auth::user()->role_id != 2) {
        //     return redirect('books');
        // }


        // return $next($request);
    }
}
