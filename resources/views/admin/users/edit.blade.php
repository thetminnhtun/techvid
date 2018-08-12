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
        Add Role to User
          <a href="{{route('user.index')}}" class="btn btn-light float-right">Back</a>
        </h3>
        <div class="card-body table-secondary">
          <div class="row justify-content-center">
            <div class="card col-md-6">
              <div class="card-body">
                <form action="{{route('user.update',$user->id)}}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="role">Example select</label>
                    <select class="form-control" id="role" name="role">
                      @foreach($roles as $role)
                        <option
                        @if($role->name == $selectedRole)
                            selected
                        @endif
                        >{{$role->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Update Role</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection