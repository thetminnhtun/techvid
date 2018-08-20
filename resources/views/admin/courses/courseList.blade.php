@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Admin Sidebar -->
        @include('layouts.sidebar.admin')
        <!-- Admin Content -->
        <section class="col-md-10">
            <ul class="list-group col-md-6">
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
                <li class="list-group-item active">
                    {{$title}}
                    <a class="btn btn-light btn-sm float-right" href="{{url("admin/course")}}">
                        Back
                    </a>
                </li>
                @foreach($courses as $course)
                <li class="list-group-item">
                    <a href="{{url("admin/course/$course->id")}}">{{$course->name}}</a>
                </li>
                @endforeach
                <div class="mt-2">
                    {{ $courses->links() }}
                </div>
            </ul>
        </section>
    </div>
</div>
@endsection
