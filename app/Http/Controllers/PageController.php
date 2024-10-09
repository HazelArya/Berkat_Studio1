<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function packages()
    {
        return view('packages');
    }

    public function aboutUs()
    {
        return view('aboutus');
    }

    public function portofolio()
    {
        return view('portofolio');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
