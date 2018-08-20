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
        <a href="{{url('admin/message')}}" class="btn btn-light btm-sm float-right">Back</a>
        </div>
        <div class="card-body table-secondary">
          <div class="row justify-content-center">
            <div class="card col-md-8">
              <div class="card-body">
                
                <form action="{{url('admin/message')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @if ($errors->any())
                  @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                    {{ $error }}
                  </div>
                  @endforeach
                  @endif
                  <div class="form-group">
                    <label for="to">To :</label>
                    <input type="text" class="form-control" id="to" name="to">
                  </div>
                  <div class="form-group">
                    <label for="image">Upload Image</label>
                    <input type="file" class="form-control-file" id="image" name="file">
                  </div>
                   <div class="form-group">
                    <label for="subject">Subject</label>
                    <textarea class="form-control" id="subject" rows="3" name="subject"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Send</button>
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