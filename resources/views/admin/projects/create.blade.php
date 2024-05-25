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
                    <h4 class="card-title">Create Project</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="post" class="needs-validation" action="{{ route('projects.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="name" 
                                        name="name"
                                        placeholder="Enter project name"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Project name is a required field.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_id">Category</label>                                            
                                    <select 
                                        class="form-select" 
                                        aria-label="Select category"
                                        name="category_id"
                                        id="category_id"
                                        required
                                    >
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Category is a required field.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="unit">Unit</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="unit" 
                                        name="unit"
                                        placeholder="Enter project unit address"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Project unit is a required field.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="town">Town</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="town" 
                                        name="town"
                                        placeholder="Enter project town"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Project town is a required field.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="city">City</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="city" 
                                        name="city"
                                        placeholder="Enter project city"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Project city is a required field.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="images">Images</label>
                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                    <small class="form-text text-muted">Max 5 images allowed, each image should not exceed 2MB</small>
                                    <div class="invalid-feedback">
                                        Project images is a required field.
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