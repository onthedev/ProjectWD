<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUser1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user-> position_id == 1) {
            return $next($request);
        }
        return redirect()->back()->with('error', 'คุณไม่มีสิทธิ์ในการเข้าถึงหน้านี้');
    }
}
