@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Admin Sidebar -->
        @include('layouts.sidebar.user')
        <!-- Start Admin Content -->
        <section class="col-md-10">
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr class="">
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Videos</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1; ?>
                    @foreach($myCourses as $myCourse)
                        @if($user->hasPermissionTo($myCourse->subCategory->name))
                            <tr>
                                <th scope="row">{{$num++}}</th>
                                <td scope="row">
                                    {{$myCourse->subCategory->name}}
                                </td>
                                <td scope="row">
                                    20 <small>Kyats</small>
                                </td>
                                <td scope="row">
                                    <a href="{{url('user/my_course/'.$myCourse->sub_category_id)}}" class="btn btn-primary btn-sm">Detail</a>
                                </td>
                                
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            
            
            
        </section>
        <!-- End Admim Content -->
    </div>
</div>
@endsection

