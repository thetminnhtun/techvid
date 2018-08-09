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
					Sub Category List
					<a href="{{url('admin/category/sub/create',$id)}}" class="btn btn-warning float-right">Create Sub Category</a>
				</h3>
				<div class="card-body table-secondary">
					@if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('danger'))
                        <div class="alert alert-warning">
                            {{ session('danger') }}
                        </div>
                    @endif
					<table class="table table-bordered ">
						<thead class="bg-success">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Sub Category</th>
								<th scope="col">Parent</th>
								<th scope="col">Edit</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody class="bg-light">
							<?php $num = 1 ?>
							@foreach($subCategories as $category)
								<tr>
									<th scope="row">{{$num++}}</th>
									<td>
										{{$category->name}}
									</td>
									<td> {{$category->category->name}} </td>
									<td>
										<a href="{{url("admin/category/sub/{$category->id}/edit")}}" class="btn btn-primary btn-sm">Edit</a>
									</td>
									<td>
										<form action="{{url("admin/category/sub/{$category->id}")}}" method="post">
											@csrf
											@method('DELETE')
											<input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">
										</form>
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