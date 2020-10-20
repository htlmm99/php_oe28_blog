<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', config('common.post.status_accepted'))->orderBy('created_at', 'asc')->with('user')->paginate(config('common.post.paginate'));

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
        } else {
            if (Auth::check() && ($author->id == Auth::user()->id || Auth::user()->role->name == config('common.role.admin'))) {
                $posts = Post::where('user_id', $author->id)->orderBy('created_at', 'asc')->paginate(config('common.post.paginate'));
            }
            else {
                $posts = Post::where('user_id', $author->id)->where('status', config('common.post.status_accepted'))->orderBy('created_at', 'asc')->paginate(config('common.post.paginate'));
            }
            $hotPosts = $author->posts()->where('status', config('common.post.status_accepted'))->orderBy('created_at', 'asc')->take(config('common.post.recent_author'))->get();
            $checkFollow = $this->checkFollow($author->id, Auth::id());

            return view('user.home', compact('author', 'posts', 'hotPosts', 'checkFollow'));
        }
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->where('status', config('common.post.status_accepted'))->orderBy('created_at', 'asc')->with('user')->paginate(config('common.post.paginate'));
        return view('app.category', compact('category', 'posts'));
    }

    public function userFollower($emailName)
    {
        $email = $emailName.'@gmail.com';
        $author = User::where('email', $email)->first();
        if (!$author) {
            abort(404);
        } else {
            $followers = $author->followers()->orderBy('created_at', 'asc')->get();
            $checkFollow = $this->checkFollow($author->id, Auth::id());
            $hotPosts = $author->posts()->where('status', config('common.post.status_accepted'))->orderBy('created_at', 'asc')->take(config('common.post.recent_author'))->get();
            return view('user.follower', compact('followers', 'author', 'checkFollow', 'hotPosts'));
        }
    }

    public function userFollowing($emailName)
    {
        $email = $emailName.'@gmail.com';
        $author = User::where('email', $email)->first();
        if (!$author) {
            abort(404);
        } else {
            $followings = $author->following()->orderBy('created_at', 'asc')->get();
            $checkFollow = $this->checkFollow($author->id, Auth::id());
            $hotPosts = $author->posts()->where('status', config('common.post.status_accepted'))->orderBy('created_at', 'asc')->take(config('common.post.recent_author'))->get();
            return view('user.following', compact('followings', 'author', 'checkFollow', 'hotPosts'));
        }
    }

    public function checkFollow($author_id, $following_id)
    {
        $author = User::findOrFail($author_id);
        $followed = $author->followers->where('id', $following_id)->first();
        if (!$followed) {
            return false;
        } else {
            return true;
        }
    }
}
