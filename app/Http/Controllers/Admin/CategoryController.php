<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Helpers\Recusive;

class CategoryController extends Controller
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
        $categories = Category::latest()->paginate(config('common.paginate_default'));

        return view('admin.category', compact('categories'));
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

        return view('admin.category_add', compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => $request->name,
        ]);

        return redirect()->route('category.index')->with('message', trans('app.message.add_success'));;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
            $category = Category::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('category.edit')->with('error', trans('message.fail'));
        }
        $categories = Category::all();
        $recusive = new Recusive($categories);
        $htmlOption = $recusive->categoryRecusive($parentId = $category->parent_id);

        return view('admin.category_edit', compact('category', 'htmlOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('category.edit', $id)->with('error', trans('message.fail'));
        }
        $task->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => $request->name,
        ]);

        return redirect()->route('category.index')->with('message', trans('message.edit_success'));
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
            $category = Category::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('category.index')->with('error', trans('app.message.fail'));
        }
        $category->delete();

        return redirect()->route('category.index')->with('message', trans('app.message.delete_success'));
    }
}
