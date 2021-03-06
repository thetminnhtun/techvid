<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(8);
        return view('admin.permissions.list', compact('permissions'));
    }

    public function add($user_id,$permission_name)
    {
        $user = User::find($user_id);
        $result = $user->givePermissionTo($permission_name);

        if ($result) {
            return redirect('admin/permission/' . $user_id);
        } else {
            return redirect()->back()->with("danger", "Permission Adding Fail!");
        }
    }

    public function remove($user_id,$permission_name)
    {
        $user = User::find($user_id);
        $result = $user->revokePermissionTo($permission_name);

        if ($result) {
            return redirect('admin/permission/' . $user_id);
        } else {
            return redirect()->back()->with("danger", "Permission Removing Fail!");
        }
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
    public function show($user_id)
    {
        $user        = User::find($user_id);
        $permissions = Permission::all();

        return view('admin.permissions.show', compact('user', 'permissions'));
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
