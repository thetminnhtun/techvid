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
        Create Course
        <a href="{{url('admin/course')}}" class="btn btn-light btn-sm float-right">Back</a>
        </div>
        <div class="card-body table-secondary">
          <div class="row justify-content-center">
            <div class="card col-md-6">
              <div class="card-body">
                
                <form action="{{url('admin/course')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @if ($errors->any())
                  @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                    {{ $error }}
                  </div>
                  @endforeach
                  @endif
                  <div class="form-group">
                    <label for="name">Course Title</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="category">Choose Category</label>
                    <select class="form-control" id="category" name="sub_category_id">
                      @foreach($subCategories as $sub_category)
                      <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="video">Upload Video</label>
                    <input type="file" class="form-control-file" id="video" name="file">
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