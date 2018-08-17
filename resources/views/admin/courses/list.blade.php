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
                    All Course
                    <a class="btn btn-light btn-sm float-right" href="{{route('course.create')}}">
                        New Course
                    </a>
                </li>
                <?php $num = $sub_categories->firstItem(); ?>
                @foreach($sub_categories as $sub_category)
                <li class="list-group-item">
                    <a href="{{url('admin/course/list/'.$sub_category->id)}}">
                        {{$num++}}. {{$sub_category->name}}
                        <span class="badge badge-warning ml-2">{{$sub_category->courses->count()}} </span>
                    </a>
                </li>
                @endforeach
                <div class="mt-2">
                    {{ $sub_categories->links() }}
                </div>
            </ul>
        </section>
    </div>
</div>
@endsection
