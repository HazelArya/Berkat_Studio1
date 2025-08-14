<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if (Auth::user()->usertype != 'admin') {
    //         return redirect('dashboard.admin');
    //     }
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->usertype !== 'admin') {
            return redirect('dashboard.admin')
                ->with('error', 'Akses ditolak! Halaman ini hanya dapat diakses oleh admin.');
        }

        return $next($request);
    }
}

