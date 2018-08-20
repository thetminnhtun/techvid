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
								<th scope="col">Email</th>
								<th scope="col">Role</th>
								<th scope="col">Date</th>
								<th scope="col">Time</th>
								<th scope="col">Permit</th>
								<th scope="col">Ban</th>
							</tr>
						</thead>
						<tbody class="">
							<?php $num = 1; ?>
							@foreach($users as $user)
							<tr>
								<th scope="row">{{$num++}}</th>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>
									@foreach($user->getRoleNames() as $roleName)
									<a href="{{url('admin/user/'.$user->id.'/edit')}}" class="btn btn-link
										@if($user->id == 1)
										text-primary disabled
										@endif
									">{{$roleName}}</a>
									@endforeach
								</td>
								<td>{{explode(' ', $user->created_at)[0]}}</td>
								<td>{{explode(' ', $user->created_at)[1]}}</td>
								
								<td>
									<a href="{{url('admin/permission',$user->id)}}" class="btn btn-primary btn-sm 
										@if($user->id == 1)
											disabled
										@endif
									">Permit</a>
								</td>
								<td>
									<a href="#" class="btn btn-danger btn-sm 
										@if($user->id == 1)
											disabled
										@endif
									">Ban</a>
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