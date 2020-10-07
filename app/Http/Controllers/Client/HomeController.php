<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

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

    public function admin()
    {
        return view('admin.user');
    }

    public function userHome($emailName)
    {
        $email = $emailName.'@gmail.com';
        $user = User::where('email', $email)->first();
        if (!$user) {
            abort(404);
        }
        else {
            $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'asc')->paginate(config('common.post.paginate'));

            return view('user.home', compact('user', 'posts'));
        }
    }
}
