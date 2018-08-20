@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<!-- Admin Sidebar -->
		@include('layouts.sidebar.admin')
		<!-- Admin Content -->
		<section class="col-md-10">
			<div class="card">
				<div class="card-header bg-primary text-white">All Users</div>
				<div class="card-body">
					@if(session('status'))
					<div class="alert alert-info">{{session('status')}}</div>
					@endif
					<table class="table">
						<thead class="bg-light">
							<tr class="">
								<th scope="col">No</th>
								<th scope="col">Name</th>
								<th scope="col">Subject</th>
								<th scope="col">Image</th>
								<th scope="col">Permit</th>
							</tr>
						</thead>
						<tbody class="">
							<?php $num = 1; ?>
							@foreach($enrolls as $enroll)
								<tr>
									<th scope="row">{{$num++}}</th>
									<td scope="row">{{App\User::find($enroll->user_id)->name}}</td>
									<td scope="row">{{$enroll->subject}}</td>
									<td scope="row">
										<a href="{{url("admin/enroll/image/$enroll->image_name")}}" class="btn btn-sm btn-warning">Image</a>
									</td>
									<td scope="row">
										<a href="{{url("admin/permission/$enroll->user_id")}}" class="btn btn-success btn-sm">Permit</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection