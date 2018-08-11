@extends('layouts.app')

@section('content')

<!-- Copy Image Link -->
<p id="demo" style="display:none;"></p>

<div class="container-fluid">

	<div class="row">
		<!-- Admin Sidebar -->
		@include('layouts.sidebar.admin')
		<!-- Admin Content -->
		<section class="col-md-10">
			<div class="card">
				<h3 class="card-header bg-primary text-white">
					All Images
					<a href="{{route('image.create')}}" class="btn btn-light float-right">Insert Image</a>
				</h3>
				<div class="card-body">
					<div class="row">
						
						@foreach($images as $image)

						<div class="col-md-4 mb-3">
							<div class="card" >
							  <img class="card-img-top" src="{{asset('imgs/uploads/'. $image->name)}}" alt="Card image cap">
							  <div class="card-footer">{{-- 
							  	<a href="#" class="btn btn-success btn-sm">Name Copy</a>
							  	<a href="#" class="btn btn-success btn-sm float-right">Link Copy</a> --}}
							  	<button class="btn btn-success btn-sm"
                                            onclick="business('{{$image->name}}')"
                                    >Name Copy
                                    </button>
                                    <button class="btn btn-success btn-sm float-right"
                                            onclick="business('{{asset("imgs/uploads/".$image->name)}}')"
                                    >Link Copy
                                    </button>
							  </div>
							</div>
						</div>

						@endforeach

					</div>

					<div class="d-flex justify-content-center">{{$images->links()}}</div>

				</div>
			</div>
		</section>
	</div>
</div>

@endsection

@section('script')
    <script>
        function business(image) {
            $("#demo").text(image);
            copy("#demo");
        }

        function copy(selector) {
            var $temp = $("<div>");
            $("body").append($temp);
            $temp.attr("contenteditable", true)
                .html($(selector).html()).select()
                .on("focus", function () {
                    document.execCommand("selectAll", false, null);
                })
                .focus();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>
@endsection