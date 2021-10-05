<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'categories';
        $categories = Category::get();
        return view('admin.categories.index',compact(
            'title','categories'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'create category';
        return view('admin.categories.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:2|max:200',
        ]);
        Category::create([
            'name' => $request->name,
        ]);
        $notification = notify("New Category created successfully");
        return redirect()->route('categories.index')->with($notification);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $title = 'edit category';
        return view('admin.categories.edit',compact('title','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name' => 'required|min:2|max:200',
        ]);
        $category->update([
            'name' => $request->name,
        ]);
        $notification = notify("category updated successfully");
        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Model $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $notification = notify("category deleted successfully");
        return back()->with($notification);
    }
}
