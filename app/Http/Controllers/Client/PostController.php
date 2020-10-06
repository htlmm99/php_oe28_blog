<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show(Request $request)
    {
        $post = Post::where('slug', $request->slug)->first();
        if (!$post) {
            abort(403);
        }
        elseif ($post->status != config('common.post.status_accepted') && Auth::user()->id != $post->user_id && Auth::user()->role_id != config('common.role.admin')) {
            abort(404);
        }
        else {
            return view('app.post_show', compact('post'));
        }
    }
}
