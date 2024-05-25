@extends('layouts.admin')

@section('style')
    <link href="{{ asset('admin-assets/plugins/image-uploader/src/image-uploader.css') }}" rel="stylesheet" type="text/css" />
    <!-- <link href="assets/plugins/uppy/uppy.min.css" rel="stylesheet" type="text/css" /> -->
@endsection

@section('content')

    @if(count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Service</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="post" class="needs-validation" action="{{ route('services.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="title" 
                                        name="title"
                                        placeholder="Enter service title"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Service title is a required field.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <textarea 
                                        class="form-control" 
                                        rows="5" 
                                        id="description"
                                        name="description"
                                        required
                                    ></textarea>
                                    <div class="invalid-feedback">
                                        Service description is a required field.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="images">Images <span class="text-danger">*</span></label>
                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                    <small class="form-text text-muted">Max 5 images allowed, each image should not exceed 2MB</small>
                                    <div class="invalid-feedback">
                                        Service images is a required field.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-check form-switch form-switch-success">
                                <input class="form-check-input" type="checkbox" name="active" id="activeSwitch" checked>
                                <label class="form-check-label" for="activeSwitch">Active</label>
                            </div>
                        </div>  
                        <button type="submit" class="btn btn-de-primary">Submit</button>
                    </form>                                           
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
@endsection

@section('script')
    <script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/image-uploader/src/image-uploader.js') }}"></script>
    <script>
        $(function () {
            $('.input-images-1').imageUploader({
                imagesInputName: 'images',
                maxFiles: 5,
                extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
                maxSize: 2 * 1024 * 1024
            });
        });
    </script>
@endsection