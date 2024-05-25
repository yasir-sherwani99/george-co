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
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Meta Tags</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="post" class="needs-validation" action="{{ route('metatags.update', $metatag->id) }}" novalidate>
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="page">Page <span class="text-danger">*</span></label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="page" 
                                        name="page"
                                        value="{{ $metatag->page }}"
                                        placeholder="Enter Page name"
                                        required
                                        disabled
                                    />
                                    <div class="invalid-feedback">
                                        Page name is a required field.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title">Title Tag <span class="text-danger">*</span></label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="title" 
                                        name="title"
                                        value="{{ $metatag->title }}"
                                        placeholder="Enter title tag"
                                        required
                                    />
                                    <small class="form-text text-muted">Max 60 characters</small>
                                    <div class="invalid-feedback">
                                        Title tag is a required field.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description Tag <span class="text-danger">*</span></label>
                                    <textarea
                                        class="form-control" 
                                        id="description" 
                                        name="description"
                                        rows="3"
                                        required
                                    >{{ $metatag->description }}</textarea>
                                    <small class="form-text text-muted">Max 250 characters</small>
                                    <div class="invalid-feedback">
                                        Description tag is a required field.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="keywords">Keywords Tag <span class="text-danger">*</span></label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="keywords" 
                                        name="keywords"
                                        value="{{ $metatag->keywords }}"
                                        placeholder="Enter keywords tag"
                                        required
                                    />
                                    <small class="form-text text-muted">Separate keywords with a comma e.g. Construction, Engineering</small>
                                    <div class="invalid-feedback">
                                        Keywords tag is a required field.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-de-primary">Update</button>
                    </form>                                           
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
@endsection
