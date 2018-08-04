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
					Courses List
					<a href="#" class="btn btn-warning float-right">Create Course</a>
				</h3>
				<div class="card-body table-secondary">
					<table class="table table-bordered ">
						<thead class="bg-success">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Name</th>
								<th scope="col">Counts</th>
								<th scope="col">Price</th>
								<th scope="col">Edit</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody class="bg-light">
							<tr>
								<th scope="row">1</th>
								<td>PHP</td>
								<td>200</td>
								<td>20000 Ks</td>
								<td>
									<a href="#" class="btn btn-primary btn-sm">Edit</a>
								</td>
								<td>
									<a href="#" class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>

@endsection