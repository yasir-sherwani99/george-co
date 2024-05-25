@extends('layouts.admin')

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

    @if(session()->has('success'))
        <div class="alert alert-success fade show" role="alert">
            <strong>Welldone! </strong>
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Admin</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="post" class="needs-validation" id="form-validation" action="{{ route('admins.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group mb-3">
                            <label for="avatar">Photo</label>
                            <img 
                                src="{{ asset('admin-assets/images/users/user-vector.png') }}" 
                                alt="Georgia Construction Co." 
                                class="thumb-lg rounded mx-3"
                                id="avatar"
                                onerror="this.onerror=null;this.src='{{ asset('admin-assets/images/users/user-vector.png') }}'" 
                            >
                            <label class="btn btn-de-primary btn-sm text-light">
                                Change Avatar 
                                <input 
                                    type="file" 
                                    hidden
                                    accept="image/*" 
                                    id="imgInp" 
                                    name="photo"
                                    onchange="imagePreview(event)"
                                />
                            </label>
                        </div><!--end form-group-->
                        <div class="form-group mb-3">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="name" 
                                name="name"
                                aria-describedby="name" 
                                placeholder="Enter full name" 
                                required
                            />
                            <div class="invalid-feedback">
                                Name is a required field.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="email" 
                                name="email"
                                aria-describedby="email" 
                                placeholder="Enter email address" 
                                required
                            />
                            <div class="invalid-feedback">
                                Email is a required field.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input 
                                type="tel" 
                                class="form-control" 
                                id="phone" 
                                name="phone"
                                aria-describedby="phone" 
                                placeholder="Enter phone number" 
                            />
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="address" 
                                name="address"
                                aria-describedby="address" 
                                placeholder="Enter address" 
                            />
                            <small class="text-muted">Full address including city</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password" 
                                name="password"
                                aria-describedby="password" 
                                placeholder="Enter password" 
                                required
                            />
                            <small class="text-muted">Password must be 6 characters or greater</small>
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
                let imgPreview = document.getElementById('avatar');
                imgPreview.src = URL.createObjectURL(newImage);
            } else {
                alert('Only images allowed');
            } 
        };
    </script>
@endsection