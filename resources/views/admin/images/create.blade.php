@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <!-- Admin Sidebar -->
    @include('layouts.sidebar.admin')
    <!-- Admin Content -->
    <section class="col-md-10">
            {{--Image Cropper Start--}}
                <div>
                    <div id="upload-demo"></div>
                    <form action="{{url('admin/image')}}" id="uploadImage" method="post">
                        @foreach($errors->all() as $error)
                            <p class="text-danger ">{{$error}}</p>
                        @endforeach
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="row justify-content-center">
                            <input type="file" id="upload" class="btn btn-primary ">
                            <input type="hidden" name="image" id="uploaddata"/>
                            <input type="text" name="imagename" id="imagename" class="mx-2" />
                            {{-- <i class="btn btn-warning upload-result mr-3">Crop</i> --}}
                            <button type="submit" class="btn btn-success upload-result ">Upload Image</button>
                        </div>
                    </form>
                </div>
                {{--Image Cropper End--}}
    </section>
  </div>
</div>

@endsection

@section('script')
    <script>
        $filename = "";
        $uploadCrop = $('#upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 600,
                height: 400,
                type: 'square'
            },
            boundary: {
                width: 700,
                height: 500
            }
        });

        $('#upload').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function () {
                    console.log('Binding Complete');
                });

            }
            $filename = this.files[0].name;
            document.getElementById('imagename').value = $filename;
            reader.readAsDataURL(this.files[0]);
        });


        $('.upload-result').on('click', function (ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (resp) {
                document.getElementById('uploadImage').onsubmit = function () {
                    document.getElementById('uploaddata').value = resp;
                };
            });
        });
    </script>
@stop


