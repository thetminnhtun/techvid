<?php

namespace App\Http\Controllers\User;

use App\Course;
use App\Enroll;
use App\Http\Controllers\Controller;
use App\SubCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = SubCategory::paginate(7);
        $enrolls        = Enroll::where('user_id', Auth::id())->get();
        return view('user.courses.list', compact('sub_categories', 'enrolls'));
    }

    public function myCourse()
    {
        $myCourses = Enroll::where('user_id', Auth::id())->get();
        $user      = User::find(Auth::id());
        return view('user.courses.my_course', compact('myCourses', 'user'));
    }

    public function download($id)
    {
        $course = Course::find($id);
        if (Auth::user()->can($course->subCategory->name)) {
            $file   = public_path() . "/videos/uploads/". $course->video_name;
            return response()->download($file);
        }

        return redirect('/user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = SubCategory::findOrFail($id)->name;
        $user  = User::find(Auth::id());
        if (!$user->hasPermissionTo($title)) {
            return redirect()->back();
        }
        $courses = Course::where('sub_category_id', $id)->paginate(5);
        return view('user.courses.show', compact('courses', 'title'));
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
