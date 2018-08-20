@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Admin Sidebar -->
        @include('layouts.sidebar.admin')
        <!-- Admin Content -->
        <section class="col-md-10">
            <div class="row">
                <!-- Start All Permission -->
                <ul class="list-group col-md-5">
                    <li class="list-group-item active">
                        All Permissions
                    </li>
                    @foreach($permissions as $permission)
                    <li class="list-group-item">
                        {{$permission->id }}. {{$permission->name}}
                    </li>
                    @endforeach
                    <div class="mt-2">
                        {{ $permissions->links() }}
                    </div>
                </ul>
                <!-- End All Permiss -->
            </div>
        </section>
    </div>
</div>
@endsection
