<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function package()
    {
        return view('package');
    }

    public function aboutUs()
    {
        return view('aboutus');
    }

    public function contact()
    {
        return view('contact');
    }

    public function welcome()
    {
        return view('welcome');
    }

}
