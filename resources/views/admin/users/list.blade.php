@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<!-- Admin Sidebar -->
		@include('layouts.sidebar.admin')
		<!-- Admin Content -->
		<section class="col-md-10">
			<div class="card">
				<h3 class="card-header bg-primary">All Users</h3>
				<div class="card-body table-secondary">
					<table class="table table-bordered table-hover">
						<thead class="bg-success">
							<tr>
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
						<tbody class=bg-light>
							<?php $num = 1; ?>
							@foreach($users as $user)
								<tr>
									<th scope="row">{{$num++}}</th>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									<td>Admin</td>
									<td>{{explode(' ', $user->created_at)[0]}}</td>
									<td>{{explode(' ', $user->created_at)[1]}}</td>
									<td>
										<a href="#" class="btn btn-primary btn-sm">Permit</a>
									</td>
									<td>
										<a href="#" class="btn btn-danger btn-sm">Ban</a>
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