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
        Edit Category
          <a href="{{url("admin/category/sub/{$subCategory->category->id}")}}" class="btn btn-warning float-right">Back</a>
        </h3>
        <div class="card-body table-secondary">
          <div class="row justify-content-center">
            <div class="card col-md-6">
              <div class="card-body">
                <form action="{{url("admin/category/sub/{$subCategory->id}")}}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="name">Sub Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$subCategory->name}}">
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>
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