<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $subCategories = SubCategory::where('category_id',$id)->get();
        $categoriesTrash = SubCategory::where('category_id',$id)->onlyTrashed()->get();

       //check parent category exit or not
        if (!Category::find($id)) {
           return redirect('admin/category');
        }

        return view('admin.sub_categories.list',compact('subCategories','id','categoriesTrash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category = Category::find($id);
        return view('admin.sub_categories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subCategory = SubCategory::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
        ]);

        Permission::create(['name' => $subCategory->name]);

        if ($subCategory) {
            return redirect("/admin/category/sub/{$subCategory->category_id}")->with("success", "New Sub Category was created Successfully!");
        } else {
            // notworking
            return redirect()->back()->with("danger", "SubCategory Creation Error!");
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
        $subCategory = SubCategory::find($id);
        //check parent category exit or not
        if (!$subCategory->category->id) {
           return redirect('admin/category');
        }
        return view('admin.sub_categories.edit',compact('subCategory'));
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
        $subCategory = SubCategory::find($id);
        $subCategory->name = $request->name;
        $result = $subCategory->save();

        if ($result) {
            return redirect("/admin/category/sub/{$subCategory->category_id}")->with("success", "New Sub Category was updated Successfully!");
        } else {
            // notworking
            return redirect()->back()->with("danger", "SubCategory updation Error!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($parentId, $id)
    {
        $category = SubCategory::find($id);
        $result = $category->delete();
        if ($result) {
            return redirect("/admin/category/sub/{$parentId}")->with("success", "Sub Category was deleted Successfully!");
        } else {
            // notworking
            return redirect()->back()->with("danger", "Sub Category deletion Error!");
        }
    }

    public function restore($parentId, $id)
    {
        $category = SubCategory::onlyTrashed()->find($id);
        $result = $category->restore();
        if ($result) {
            return redirect("/admin/category/sub/{$parentId}")->with("success", "Sub Category was restored Successfully!");
        } else {
            // notworking
            return redirect()->back()->with("danger", "Sub Category restored Error!");
        }
    }
}
