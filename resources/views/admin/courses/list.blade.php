@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Admin Sidebar -->
        @include('layouts.sidebar.admin')
        <!-- Start Admin Content -->
        <section class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    All Course
                    <a href="{{url('admin/course/create')}}" class="btn btn-light btn-sm float-right">New Course</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr class="">
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Prices</th>
                                <th scope="col">Videos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $num = $sub_categories->firstItem(); ?>
                            @foreach($sub_categories as $sub_category)
                            <tr>
                                <th scope="row">{{$num++}}</th>
                                <td scope="row">
                                    <a href="{{url("admin/course/list/$sub_category->id")}}">
                                    {{$sub_category->name}}
                                    </a>
                                </td>
                                <td scope="row">
                                    {{$sub_category->price}} <small>Kyats</small>
                                </td>
                                <td scope="row">
                                    <span class="badge badge-primary">
                                        {{$sub_category->courses->count()}}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                <div class="card-footer p-0">
                    <div class="d-flex justify-content-center mt-3">{{$sub_categories->links()}}</div>
                </div>
            </div>
        </section>
        <!-- End Admim Content -->
    </div>
</div>
@endsection