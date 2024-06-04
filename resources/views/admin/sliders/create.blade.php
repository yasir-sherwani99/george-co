@extends('layouts.admin')

@section('style')
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
                    <h4 class="card-title">Create Slider</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form 
                        method="post" 
                        class="needs-validation" 
                        action="{{ route('sliders.store') }}" 
                        enctype="multipart/form-data" 
                        novalidate
                    >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="slider">Slider</label>
                                    <img 
                                        src="{{ asset('admin-assets/images/default/noimage.png') }}" 
                                        alt="Georgia Construction Co." 
                                        class="img-fluid"
                                        id="slider"
                                        onerror="this.onerror=null;this.src='{{ asset('admin-assets/images/default/noimage.png') }}'" 
                                    >
                                    <br />
                                    <br />
                                    <label class="btn btn-de-primary btn-sm text-light">
                                        Change Slider 
                                        <input 
                                            type="file" 
                                            hidden
                                            accept="image/*" 
                                            id="imgInp" 
                                            name="photo"
                                            onchange="imagePreview(event)"
                                            required
                                        />
                                    </label>
                                    <div class="invalid-feedback">
                                        Slider image is a required field.
                                    </div>
                                </div><!--end form-group-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="heading">Heading <span class="text-danger">*</span></label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="heading" 
                                        name="heading"
                                        placeholder="Enter slider heading"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Slider heading is a required field.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="sub_heading">Subheading <span class="text-danger">*</span></label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="sub_heading" 
                                        name="sub_heading"
                                        placeholder="Enter slider subheading"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Slider subheading is a required field.
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
    <script>
        let imagePreview = function(event) {
            let newImage = event.target.files[0];
            let imageExt = newImage.type;
            if(imageExt == "image/jpg" || imageExt == "image/png" || imageExt == "image/gif" || imageExt == "image/svg" || imageExt == "image/jpeg") {
                let imgPreview = document.getElementById('slider');
                imgPreview.src = URL.createObjectURL(newImage);
            } else {
                alert('Only images allowed');
            } 
        };
    </script>
@endsection