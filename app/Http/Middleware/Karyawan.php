<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Karyawan
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->usertype != 'karyawan') {
            return redirect('dashboard.karyawan');
        }
        return $next($request);
    }
}
