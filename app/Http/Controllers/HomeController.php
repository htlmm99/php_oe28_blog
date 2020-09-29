<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('app.homepage');
    }

    public function contact()
    {
        return view('app.contact');
    }
}
