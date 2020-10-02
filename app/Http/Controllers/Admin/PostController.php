<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Recusive;
use App\Helpers\Process;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $recusive = new Recusive($categories);
        $htmlOption = $recusive->categoryRecusive($parentId = '');
        return view('user.post_create', compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = [
            'title' => $request->title,
            'slug' => $request->title,
            'user_id' => Auth::id(),
            'content' => Process::addDivToContent($request->content),
            'category_id' => $request->category_id,
            'admin_id' => config('common.post.admin_default'),
            'status' => config('common.post.status_waiting'),
        ];
        $fileName = $request->thumbnail->getClientOriginalName();
        $request->thumbnail->storeAs('storage/', $fileName);
        $post['thumbnail'] = "storage/".$fileName;
        $post = Post::create($post);

        return redirect()->route('user')->with('message', trans('app.message.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
