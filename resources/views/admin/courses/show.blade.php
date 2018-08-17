@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Admin Sidebar -->
        @include('layouts.sidebar.admin')
        <!-- Admin Content -->
        <section class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{$course->name}}
                </div>
                <div class="card-body">
                    <div class="embed-responsive embed-responsive-16by9">

                    	 <video width="320" height="240" controls>
						  <source src="{{asset('videos/uploads/'.$course->video_name)}}" type="video/mp4">
						</video> 
                       
                    </div>
                </div>
        </section>
    </div>
</div>
@endsection
