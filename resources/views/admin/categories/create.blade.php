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

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Category</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="post" class="needs-validation" action="{{ route('categories.store') }}" novalidate>
                        @csrf
                        <div class="form-group mb-3">
                            <label for="category_name">Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="category_name" 
                                name="category_name"
                                aria-describedby="name" 
                                placeholder="Enter category name" 
                                required
                            />
                            <div class="invalid-feedback">
                                Category name is a required field.
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