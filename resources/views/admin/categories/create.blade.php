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
        Create Category
          <a href="{{route('category.index')}}" class="btn btn-light float-right">Back</a>
        </h3>
        <div class="card-body table-secondary">
          <div class="row justify-content-center">
            <div class="card col-md-6">
              <div class="card-body">
                <form action="{{route('category.store')}}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <button type="submit" class="btn btn-primary">Create</button>
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