@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- User Sidebar -->
    @include('layouts.sidebar.user')
    <!-- Start User Content -->
    <section class="col-md-10">
      <div class="card ">
        <div class="card-header bg-primary text-white">
        New Message
        <a href="{{url('user/message')}}" class="btn btn-light btm-sm float-right">Back</a>
        </div>
        <div class="card-body table-secondary">
          <div class="row justify-content-center">
            <div class="card col-md-8">
              <div class="card-body">
                
                <form action="{{url('user/message')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @if ($errors->any())
                  @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                    {{ $error }}
                  </div>
                  @endforeach
                  @endif
                  
                    <input type="hidden" class="form-control" id="to" name="to" value=1 >
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
    <!-- End User Content -->
  </div>
</div>
@endsection