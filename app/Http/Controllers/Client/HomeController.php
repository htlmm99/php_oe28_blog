<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'asc')->with('user')->paginate(config('common.post.paginate'));

        return view('app.homepage', compact('posts'));
    }

    public function contact()
    {
        return view('app.contact');
    }

    public function userHome($emailName)
    {
        $email = $emailName.'@gmail.com';
        $author = User::where('email', $email)->first();
        if (!$author) {
            abort(404);
        }
        else {
            if (Auth::check() && ($author->id == Auth::user()->id || Auth::user()->role->name == config('common.role.admin'))) {
                $posts = Post::where('user_id', $author->id)->orderBy('created_at', 'asc')->paginate(config('common.post.paginate'));
                $hotPosts = $author->posts()->orderBy('created_at', 'asc')->take(config('common.post.recent_author'))->get();

            }
            else {
                $posts = Post::where('user_id', $author->id)->where('status', config('common.post.accepted'))->orderBy('created_at', 'asc')->paginate(config('common.post.paginate'));
                $hotPosts = $author->posts()->where('status', config('common.post.accepted'))->orderBy('created_at', 'asc')->take(config('common.post.recent_author'))->get();
            }

            return view('user.home', compact('author', 'posts', 'hotPosts'));
        }
    }
}
