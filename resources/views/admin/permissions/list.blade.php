@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Admin Sidebar -->
        @include('layouts.sidebar.admin')
        <!-- Admin Content -->
        <section class="col-md-10">
            
            <ul class="list-group col-md-6">
              <li class="list-group-item active">All Permissions</li>
                @foreach($permissions as $permission)
                    <li class="list-group-item">{{$permission->id }}. {{$permission->name}}</li>
                @endforeach
                <div class="mt-2">{{ $permissions->links() }}</div>
            </ul>
        </section>
    </div>
</div>
@endsection
