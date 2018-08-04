@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<!-- Admin Sidebar -->
		@include('layouts.sidebar.admin')
		<!-- Admin Content -->
		<section class="col-md-10">
			<div class="card ">
				<h3 class="card-header bg-primary">
				All Messages
				<a class="btn btn-warning float-right" href="#">
					Create Category
				</a>
				</h3>
				<div class="card-body table-secondary">
					<table class="table table-bordered ">
						<thead class="bg-success">
							<tr>
								<th scope="col"> No </th>
								<th scope="col"> From </th>
								<th scope="col"> Subject </th>
								<th scope="col"> Date </th>
								<th scope="col"> Time </th>
							</tr>
						</thead>
						<tbody class="bg-light">
							<tr>
								<th scope="row"> 1 </th>
								<td> Bob </td>
								<td> Lorem ipsum dolor sit amet, consectetur adipisicing </td>
								<td> 2018-08-03 </td>
								<td> 15:36:45 </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection