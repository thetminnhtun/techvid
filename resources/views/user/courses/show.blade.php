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
            <div class="card">
                <!-- Start card-header -->
                <div class="card-header">
                    {{$title}}
                </div>
                <!-- End card-header -->
                <!-- Start card-body -->
                <div class="card-body">
                     <table class="table table-bordered">
                        <thead class="bg-light">
                            <tr class="">
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $num = $courses->firstItem(); ?>
                            @foreach($courses as $course)
                                
                                    <tr>
                                        <th scope="row">{{$num++}}</th>
                                        <td scope="row">
                                            {{$course->name}}
                                        </td>
                                        <td scope="row">
                                            <a href="{{url("user/my_course/download/$course->id")}}" class="btn btn-primary btn-sm">
                                                Download
                                            </a>
                                        </td>
                                        
                                    </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End card-body -->
                <!-- Start card-footer -->
                <div class="card-footer pb-0">
                    <div class="d-flex justify-content-center">
                        {{$courses->links()}}
                    </div>
                </div>
                <!-- End card-footer -->
            </div>
           
            
            
        </section>
        <!-- End Admim Content -->
    </div>
</div>
@endsection

