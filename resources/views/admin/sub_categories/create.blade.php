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
        Create Sub Category
          <a href="{{route('category.index')}}" class="btn btn-light btn-sm float-right">Back</a>
        </div>
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="card col-md-6">
              <div class="card-body">
                <form action="{{url('admin/category/sub')}}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="name">Sub Category Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="category">Parent Category</label>
                    <input class="form-control" id="category" type="text" placeholder="{{$category->name}}" disabled>
                    <input type="hidden" name="category_id" value="{{$category->id}}" >
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