@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<!-- User Sidebar -->
		@include('layouts.sidebar.user')
		<!-- Start User Content -->
		<section class="col-md-10">
			@if(session('success'))
				<div class="alert alert-success">{{session('success')}}</div>
			@endif
			<div class="card ">
				<div class="card-header bg-primary text-white d-flex">
				<div class="mr-auto">All Messages</div>
				<a class="btn btn-light btn-sm " href="{{url('user/message')}}">
					Inbox
				</a>
				<a class="btn btn-light btn-sm mx-2" href="{{url('user/message/sent')}}">
					sent
				</a>
				<a class="btn btn-light btn-sm " href="{{url('user/message/create')}}">
					New Message
				</a>
				</div>
				<div class="card-body ">
					<table class="table ">
						<thead class="bg-light">
							<tr>
								<th scope="col"> No </th>
								<th scope="col"> From </th>
								<th scope="col"> To </th>
								<th scope="col"> Subject </th>
								<th scope="col">Image</th>
								<th scope="col"> Date </th>
								<th scope="col"> Time </th>
							</tr>
						</thead>
						<tbody class="">
							@foreach($messages as $message)
								<tr>
								<th scope="row"> 1 </th>
								<td> {{App\User::find($message->from)->name}} </td>
								<td> {{App\User::find($message->to)->name}} </td>
								<td> {{$message->subject}}</td>
								<td>
									@if($message->image_name)
										<a href="{{url('user/message/image/'.$message->image_name)}}" class="btn btn-sm btn-info">Image</a>
									@endif
								</td>
								<td> {{explode(' ',$message->updated_at)[0]}} </td>
								<td> {{explode(' ',$message->updated_at)[1]}} </td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</section>
		<!-- End User Content -->
	</div>
</div>
@endsection