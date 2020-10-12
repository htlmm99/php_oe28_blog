<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show(Request $request)
    {
        $post = Post::where('slug', $request->slug)->first();
        if (!$post) {
            abort(403);
        }
        elseif ($post->status != config('common.post.status_accepted') && !Auth::check() && Auth::user()->id != $post->user_id && Auth::user()->role->name != config('common.role.admin')) {
            abort(404);
        }
        else {
            $post->load('tags');
            $author = $post->user;
            $relatedPosts = $post->category->posts()->where('id', '!=', $post->id)->where('status', config('common.post.status_accepted'))->orderBy('created_at', 'asc')->take(config('common.post.related_posts'))->get();
            $recentPosts = $author->posts()->where('id', '!=', $post->id)->where('status', config('common.post.status_accepted'))->orderBy('created_at', 'asc')->take(config('common.post.recent_author'))->get();
            $comments = $post->comments()->orderBy('created_at', 'asc')->get();
            return view('app.post_show', compact('post', 'relatedPosts', 'recentPosts', 'author', 'comments'));
        }
    }
}
