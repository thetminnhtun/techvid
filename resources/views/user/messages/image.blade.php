@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<!-- User Sidebar -->
		@include('layouts.sidebar.user')
		<!-- Start User Content -->
		<section class="col-md-10">
			<div class="card">
				<div class="card-header bg-primary text-white">
				Image
				<a href="{{url('user/message')}}" class="btn btn-light float-right">Back</a>
				</div>
				<div class="card-body">
					<img class="card-img-top" src="{{asset('imgs/uploads/'. $image)}}" alt="Card image cap">
				</div>
			</div>
		</section>
		<!-- End User Content -->
	</div>
</div>
@endsection