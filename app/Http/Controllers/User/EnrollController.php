<?php

namespace App\Http\Controllers\User;

use App\Enroll;
use App\Http\Controllers\Controller;
use App\Http\Requests\EnrollRequest;
use App\Http\Requests\MessageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(MessageRequest $request)
    {
        //check request file
        // $fileName = '';
        // if($request->file('file')){
        //     $file = $request->file('file');
        //     $fileName = time() . '_' .$file->getClientOriginalName();
        //     $path = public_path(). '/imgs/uploads/';
        //     $file->move($path,$fileName);
        // }

        // Message::create([
        //     'user_id' => Auth::id(),
        //     'sub_category_id'=> 1,
        //     'image_name'=> $fileName,
        //     'subject'=> $request->get('subject'),
        // ]);

        // return redirect()->route('message.index')->with('success', 'Message was sent successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.enrolls.show');
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
    public function update(EnrollRequest $request, $id)
    {

        //check request file
        $fileName = '';
        if ($request->file('file')) {
            $file     = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path     = public_path() . '/imgs/uploads/';
            $file->move($path, $fileName);
        }

        Enroll::create([
            'user_id'         => Auth::id(),
            'sub_category_id' => $id,
            'image_name'      => $fileName,
            'subject'         => $request->get('subject'),
        ]);

        $count = 0;
        session(['enroll_count' => $count+=1]);

        return redirect('user/course')->with('success', 'Successfully Enrolled !');
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
