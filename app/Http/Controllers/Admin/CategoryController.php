<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
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
        $categories = Category::all();
        $categoriesTrash = Category::onlyTrashed()->get();

        return view('admin.categories.list',compact('categories', 'categoriesTrash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category       = new Category();
        $category->name = $request->name;
        $result         = $category->save();

        if ($result) {
            return redirect('/admin/category')->with("success", "New Category was created Successfully!");
        } else {
            // notworking
            return redirect()->back()->with("danger", "Category Creation Error!");
        }
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
        $category = Category::find($id);
        return view('admin.categories.edit',compact('category'));
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
        $category = Category::find($id);
        $category->name = $request->name;
        $result = $category->save();
        if ($result) {
            return redirect('/admin/category')->with("success", "Category was updated Successfully!");
        } else {
            // notworking
            return redirect()->back()->with("danger", "Category updation Error!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $result = $category->delete();
        if ($result) {
            return redirect('/admin/category')->with("success", "Category was deleted Successfully!");
        } else {
            // notworking
            return redirect()->back()->with("danger", "Category deletion Error!");
        }
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $result = $category->restore();
        if ($result) {
            return redirect('/admin/category')->with("success", "Category was restored Successfully!");
        } else {
            // notworking
            return redirect()->back()->with("danger", "Category restored Error!");
        }
    }
}
