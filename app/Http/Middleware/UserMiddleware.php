<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->level === 'user') {
            return $next($request);
        }

        // return redirect('/')->with('error', 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้');
        return redirect()->route('LoginPage')->with('error', 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้ กรุณาลงชื่อเข้าระบบ');
    }
}
