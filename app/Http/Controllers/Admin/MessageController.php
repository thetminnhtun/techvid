<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::where('to',Auth::id())->get();
        return view('admin.messages.list', compact('messages'));
    }

    public function sent()
    {
        $messages = Message::where('from',Auth::id())->get();
        return view('admin.messages.list', compact('messages'));
    }

    public function image($name)
    {
        $image = Message::where('image_name',$name)->firstOrFail()->image_name;
        return view('admin.messages.image', compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        // for request to
        if($request->get('to') == 'all'){
            $to = 0;
        }else{
            $to = User::where('name',$request->get('to'))->first()->id;
            if(!$to){
                return back()->withErrors($request->get('to') . ' not found !');
            }
        }

        //check request file
        $fileName = '';
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = time() . '_' .$file->getClientOriginalName();
            $path = public_path(). '/imgs/uploads/';
            $file->move($path,$fileName);
        }

        Message::create([
            'from' => Auth::id(),
            'to'=> $to,
            'image_name'=> $fileName,
            'subject'=> $request->get('subject'),
        ]);

        return redirect('admin/message')->with('success', 'Message was sent successfully !');
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
