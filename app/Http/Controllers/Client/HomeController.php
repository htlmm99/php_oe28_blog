<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('app.contact');
    }

    public function admin()
    {
        return view('admin.user');
    }
}
