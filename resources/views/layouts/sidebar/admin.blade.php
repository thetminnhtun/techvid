<aside class="col-md-2">
	<div class="list-group list-group-flush">
		<a href="{{url('admin/user')}}" class="list-group-item">Users</a>
		<a href="{{url('admin/category')}}" class="list-group-item ">Categores</a>
		<a href="{{url('admin/image')}}" class="list-group-item ">Images</a>
		<a href="{{url('admin/course')}}" class="list-group-item ">Coures</a>
		<a href="{{url('admin/role')}}" class="list-group-item ">Roles</a>
		<a href="{{url('admin/permission')}}" class="list-group-item ">Permissions</a>
		<a href="{{url('admin/message')}}" class="list-group-item ">
			Messages
			@if(session()->has('message_count'))
				<span class="badge badge-warning">
					{{session()->get('message_count')}}
				</span>
			@endif
		</a>
		<a href="{{url('admin/enroll')}}" class="list-group-item ">
			Enrolls
			@if(session()->has('enroll_count'))
				<span class="badge badge-warning">
					{{session()->get('enroll_count')}}
				</span>
			@endif
		</a>
	</div>
</aside>

