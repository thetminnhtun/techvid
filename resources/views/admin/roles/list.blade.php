@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<!-- Admin Sidebar -->
		@include('layouts.sidebar.admin')
		<!-- Admin Content -->
		<section class="col-md-10">
				
			<ul class="list-group col-md-6">
			  <li class="list-group-item active">All Roles</li>
				@foreach($roles as $role)
			  		<li class="list-group-item">{{$role->id }}. {{$role->name}}</li>
				@endforeach
			</ul>

		</section>
	</div>
</div>

@endsection