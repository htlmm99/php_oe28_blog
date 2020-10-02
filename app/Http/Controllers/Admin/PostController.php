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
    private $htmlOption = '';
    private $categories;
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




        $data = [
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id(),
            'content' => Process::addDivToContent($request->content),
            'category_id' => $request->category_id,
            'admin_id' => config('common.post.admin_default'),
        ];
        if (!$request->thumbnail) {
            $data['thumbnail'] = strpos($request->request->get('content'), '<img') ?
                explode('"', explode('src="', $request->request->get('content'))[1])[0] :
                config('company.default_post_img');
        } else {
            $thumbnail = $request->thumbnail;
            $filename = uniqid() . '-' . $thumbnail->getClientOriginalName();
            $thumbnail->move('storage/', $filename);
            $data['thumbnail'] = "/storage/$filename";
        }
        $post = Post::create($data);
        //return redirect()->route('post.waiting');
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

    public function categoryRecusive($parentId, $id = 0, $text = '')
    {
        foreach ($this->categories as $value) {
            if ($value['parent_id'] == $id) {
                if ( !empty($parentId) && $parentId == $value['id']) {
                    $this->htmlOption .= "<option selected value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                } else {
                    $this->htmlOption .= "<option value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                }

                $this->categoryRecusive($parentId, $value['id'], $text. '--');
            }
        }

        return $this->htmlOption;

    }
}
