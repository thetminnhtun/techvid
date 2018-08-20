@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Admin Sidebar -->
        @include('layouts.sidebar.admin')
        <!-- Admin Content -->
        <section class="col-md-10">
            @if(session('danger'))
            <div class="alert alert-danger">{{session('danger')}}</div>
            @endif
            <div class="row">
                <!-- Start All Permission -->
                <ul class="list-group col-md-5">
                    <li class="list-group-item active">
                        All Permissions
                    </li>
                    @foreach($permissions as $permission)
                    @if(!$user->hasPermissionTo($permission))
                    <li class="list-group-item d-flex justify-content-sm-between">
                        {{$permission->id }}. {{$permission->name}}
                        <a href="{{url("admin/permission/add/$user->id/$permission->name")}}"><b>+</b></a>
                    </li>
                    @endif
                    @endforeach
                    <div class="mt-2">
                        {{-- {{ $permissions->links() }} --}}
                    </div>
                </ul>
                <!-- End All Permiss -->
                <!-- Start User's Permission -->
                <ul class="list-group col-md-5">
                    <li class="list-group-item active">
                        {{$user->name}}'s Permissions
                    </li>
                    @foreach($permissions as $permission)
                    @if($user->hasPermissionTo($permission))
                    <li class="list-group-item d-flex justify-content-sm-between">
                        {{$permission->id }}. {{$permission->name}}
                        <a href="{{url("admin/permission/remove/$user->id/$permission->name")}}"><b>&minus;</b></a>
                    </li>
                    @endif
                    @endforeach
                    <div class="mt-2">
                        {{-- {{ $permissions->links() }} --}}
                    </div>
                </ul>
                <!-- End User's Permission -->
            </div>
        </section>
    </div>
</div>
@endsection