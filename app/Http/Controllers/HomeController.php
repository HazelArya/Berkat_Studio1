<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class HomeController extends Controller
// {
//     public function index()
//     {
//         if (auth()->user()->role === 'admin') {
//             return view('admin.dashboard');
//         } elseif (auth()->user()->role === 'karyawan') {
//             return view('karyawan.dashboard');
//         }
//         return redirect()->route('home');
//     }
    
// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->is('admin/dashboard')) {
            return view('admin.dashboard');
        } elseif ($request->is('karyawan/dashboard')) {
            return view('karyawan.dashboard');
        }
    }
}
