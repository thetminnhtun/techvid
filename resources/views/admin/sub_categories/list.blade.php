@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<!-- Admin Sidebar -->
		@include('layouts.sidebar.admin')
		<!-- Admin Content -->
		<section class="col-md-10">
			<div class="card ">
				<h3 class="card-header bg-primary text-white">
					Sub Category List
					<a href="{{url('admin/category/sub/create',$id)}}" class="btn btn-light float-right">Create Sub Category</a>
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
							<tr class="text-white"> 
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
										<form action="{{url("admin/category/sub/{$category->category->id}/{$category->id}")}}" method="post">
											@csrf
											@method('DELETE')
											<input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">
										</form>
									</td>
								</tr>
							@endforeach
							<!-- categroy from trash -->
							@if($categoriesTrash)
							<?php $num = 1 ?>
								@foreach($categoriesTrash as $category)
									<tr class="text-muted table-warning">
										<th scope="row" >{{$num++}}</th>
										<td scope="row" ><del>{{$category->name}}</del></td>
										<td><a href="{{url('admin/category/sub',$category->id)}}" class="btn btn-sm btn-warning disabled" >Sub</a>
										</td>
										<td>
											<a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-primary btn-sm disabled" >Edit</a>
										</td>
										<td>
											<a href="{{url("admin/category/sub/restore/{$category->category->id}/{$category->id}")}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure to restore?')">Restore</a>
										</td>
									</tr>
							@endforeach
							@endif
							<!-- end cateory from trash -->
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>

@endsection