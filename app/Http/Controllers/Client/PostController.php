<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Request $request)
    {
        $post = Post::with()
        return view('app.post_show');
    }
}
