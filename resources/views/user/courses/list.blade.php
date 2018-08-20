@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Admin Sidebar -->
        @include('layouts.sidebar.user')
        <!-- Start Admin Content -->
        <section class="col-md-10">
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr class="">
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Prices</th>
                        <th scope="col">Videos</th>
                        <th scope="col">Enroll</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = $sub_categories->firstItem(); ?>
                    @foreach($sub_categories as $sub_category)
                    <tr>
                        <th scope="row">{{$num++}}</th>
                        <td scope="row">
                            {{$sub_category->name}}
                        </td>
                        <td scope="row">
                            {{$sub_category->price}} <small>Kyats</small>
                        </td>
                        <td scope="row">
                            <span class="badge badge-primary">
                                {{$sub_category->courses->count()}}
                            </span>
                        </td>
                        <td>
                            <a href="{{url("user/enroll/$sub_category->id")}}" class="btn btn-success btn-sm
                                
                                @foreach($enrolls as $enroll)
                                
                                @if($enroll->sub_category_id == $sub_category->id)
                                disabled
                                @endif
                                
                                @endforeach
                                
                            "> enroll </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            
            <div class="d-flex justify-content-center mt-3">{{$sub_categories->links()}}</div>
        </section>
        <!-- End Admim Content -->
    </div>
</div>
@endsection

