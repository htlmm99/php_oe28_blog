<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    public function follow(Request $request)
    {
        $author = User::findOrFail($request->author_id);
        $followed = $author->followers->where('id', $request->following_id)->first();
        if (!$followed) {
            $author->followers()->attach($request->following_id);
            return redirect()->back();
        }
        else {
            $author->followers()->detach($request->following_id);
            return redirect()->back();
        }
    }
}
