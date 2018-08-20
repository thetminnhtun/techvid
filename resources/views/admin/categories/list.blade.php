@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<!-- Admin Sidebar -->
		@include('layouts.sidebar.admin')
		<!-- Admin Content -->
		<section class="col-md-10">
			<div class="card ">
				<div class="card-header bg-primary text-white">
					Category List
					<a href="{{url('admin/category/create')}}" class="btn btn-light btn-sm float-right">Create Category</a>
				</div>
				<div class="card-body">
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
					<table class="table ">
						<thead class="bg-light">
							<tr class="">
								<th scope="col">No</th>
								<th scope="col">Name</th>
								<th scope="col">Sub</th>
								<th scope="col">Edit</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody class="">
							<?php $num = 1 ?>
							@foreach($categories as $category)
								<tr>
									<th scope="row">{{$num++}}</th>
									<td scope="row">{{$category->name}}</td>
									<td><a href="{{url('admin/category/sub',$category->id)}}" class="btn btn-sm btn-success">Sub</a>
									</td>
									<td>
										<a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
									</td>
									<td>
										<form action="{{url('admin/category/'.$category->id)}}" method="post" 
											>
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
											<a href="{{url('admin/category/restore',$category->id)}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure to restore?')">Restore</a>
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