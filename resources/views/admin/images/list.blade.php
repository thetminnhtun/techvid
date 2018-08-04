@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<!-- Admin Sidebar -->
		@include('layouts.sidebar.admin')
		<!-- Admin Content -->
		<section class="col-md-10">
			<div class="card">
				<h3 class="card-header bg-primary">
					All Images
					<a href="#" class="btn btn-warning float-right">Insert Image</a>
				</h3>
				<div class="card-body">
					<div class="row">

						<div class="col-md-4 mb-3">
							<div class="card" >
							  <img class="card-img-top" src="{{asset('imgs/dummy.jpg')}}" alt="Card image cap">
							  <div class="card-footer">
							  	<a href="#" class="btn btn-success btn-sm">Name Copy</a>
							  	<a href="#" class="btn btn-success btn-sm float-right">Link Copy</a>
							  </div>
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<div class="card">
							  <img class="card-img-top" src="{{asset('imgs/dummy.jpg')}}" alt="Card image cap">
							  <div class="card-footer">
							  	<a href="#" class="btn btn-success btn-sm">Name Copy</a>
							  	<a href="#" class="btn btn-success btn-sm float-right">Link Copy</a>
							  </div>
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<div class="card">
							  <img class="card-img-top" src="{{asset('imgs/dummy.jpg')}}" alt="Card image cap">
							  <div class="card-footer">
							  	<a href="#" class="btn btn-success btn-sm">Name Copy</a>
							  	<a href="#" class="btn btn-success btn-sm float-right">Link Copy</a>
							  </div>
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<div class="card">
							  <img class="card-img-top" src="{{asset('imgs/dummy.jpg')}}" alt="Card image cap">
							  <div class="card-footer">
							  	<a href="#" class="btn btn-success btn-sm">Name Copy</a>
							  	<a href="#" class="btn btn-success btn-sm float-right">Link Copy</a>
							  </div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
	</div>
</div>

@endsection