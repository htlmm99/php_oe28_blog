<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Recusive;
use App\Helpers\Process;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (is_null($request->status)) {
            $status = 'recent_posts';
            $posts = Post::latest()->paginate(config('common.paginate_default'));
        }
        else {
            $status = $request->status;
            $posts = Post::where('status', $status)->orderBy('created_at', 'asc')->paginate(config('common.paginate_default'));
            $status = $status==config('common.post.status_accepted') ? 'post.accepted' : ($status==config('common.post.status_waiting') ? 'post.waiting' : 'post.rejected');
        }

        return view('admin.post', compact('posts', 'status'));
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
        $request->thumbnail->move('storage/', $fileName);
        $post['thumbnail'] = "storage/".$fileName;
        $post = Post::create($post);
        $this->storeTags($post->id, $request->tag);

        return redirect()->route('post.show', ['slug' => $post->slug])->with('message', trans('app.message.add_success'));
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
        try {
            $post = Post::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->to(url()->previous())->with('error', trans('app.message.fail'));
        }
        if (Auth::user()->role->name != config('common.role.admin') && Auth::id() != $post->user_id ) {
            abort(403);
        }
        $tags = '';
        foreach ($post->tags as $tag) {
            $tags = $tag->name.',';
        }
        $categories = Category::all();
        $recusive = new Recusive($categories);
        $htmlOption = $recusive->categoryRecusive($parentId = '');

        return view('user.post_edit', compact('post', 'tags', 'categories', 'htmlOption'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        try {
            $post = Post::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->to(url()->previous())->with('error', trans('app.message.fail'));
        }
        if (Auth::user()->role->name != config('common.role.admin') && Auth::id() != $post->user_id ) {
            abort(403);
        }
        $newPost = [
            'title' => $request->title,
            'slug' => $request->title,
            'content' => Process::addDivToContent($request->content),
            'category_id' => $request->category_id,
        ];
        if ($request->hasFile('thumbnail')) {
            $fileName = $request->thumbnail->getClientOriginalName();
            $request->thumbnail->move('storage/', $fileName);
            $post['thumbnail'] = "storage/".$fileName;
        }
        $post->update($newPost);
        $this->storeTags($post->id, $request->tag);

        return redirect()->route('post.show', ['slug' => $post->slug])->with('message', trans('app.message.add_success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $post = Post::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('admin.post')->with('error', trans('app.message.fail'));
        }
        if (Auth::user()->role->name != config('common.role.admin') && Auth::id() != $post->user_id) {
            abort(403);
        }
        DB::transaction(function () use ($id, $post) {
            $post->comments()->delete();
            $post->votes()->delete();
            DB::table('post_tag')->where('post_id', $id)->delete();
            $post->delete();
        });

        return redirect()->to(url()->previous())->with('message', trans('app.message.delete_success'));
    }


    public function waiting($id)
    {
        try {
            $post = Post::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('admin.post')->with('error', trans('app.message.fail'));
        }
        $post->update(['status' => config('common.post.status_waiting')]);

        return redirect()->route('admin.post', ['status' => config('common.post.status_waiting')])->with('message', trans('app.message.action_success'));
    }

    public function reject($id)
    {
        try {
            $post = Post::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('admin.post')->with('error', trans('app.message.fail'));
        }
        $post->update(['status' => config('common.post.status_rejected')]);

        return redirect()->route('admin.post', ['status' => config('common.post.status_rejected')])->with('message', trans('app.message.action_success'));
    }

    public function accept($id)
    {
        try {
            $post = Post::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('admin.post')->with('error', trans('app.message.fail'));
        }
        $post->update(['status' => config('common.post.status_accepted')]);

        return redirect()->route('admin.post', ['status' => config('common.post.status_accepted')])->with('message', trans('app.message.action_success'));
    }

    public function storeTags($postId, $tags)
    {
        $tags = explode(',', $tags);
        foreach ($tags as $tag) {
            $tag = trim($tag);
            $checkTag = Tag::where('name', $tag)->first();
            if (!$checkTag) {
                $checkTag = Tag::create(['name' => $tag]);
            }
            $checkTag->posts()->attach($postId);
        }
    }
}
