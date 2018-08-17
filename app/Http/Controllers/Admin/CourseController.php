<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sub_categories = SubCategory::paginate(8);
        return view('admin.courses.list', compact('sub_categories'));

    }

    public function showByCategory($id)
    {
    $courses = Course::where('sub_category_id', $id)->paginate(8);
        $title   = SubCategory::findOrFail($id)->name;
        return view('admin.courses.courseList', compact('courses','title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCategories = SubCategory::all();
        return view('admin.courses.create', compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $file     = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $path     = public_path() . '/videos/uploads/';
        $file->move($path, $fileName);
        $foo = Course::create([
            'name'            => $request->get('name'),
            'sub_category_id' => $request->get('sub_category_id'),
            'video_name'      => $fileName,
        ]);

        return redirect()->route('course.index')->with('success', 'You have created one course !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.show',compact('course'));
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
