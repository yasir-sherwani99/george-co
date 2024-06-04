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
    @if(session()->has('alert'))
        <div class="alert alert-danger fade show" role="alert">
            <strong>Woops! </strong>
            {{ session()->get('alert') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12 col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Change Password</h4>
                </div>
                <div class="card-body">
                    <form 
                        action="{{ route('password.change') }}" 
                        method="post" 
                        class="needs-validation" 
                        novalidate
                    >
                        @csrf
                        <div class="form-group mb-3 row">
                            <div class="col-lg-12 col-xl-12">
                                <label for="current_password" class="form-label">Current Password <span class="text-danger">*</span></label>
                                <input 
                                    type="password" 
                                    id="current_password"
                                    class="form-control"
                                    name="current_password"
                                    placeholder="Enter your current/existing password"
                                    required
                                />
                                <div class="invalid-feedback">
                                    Current password is a required field.
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col-lg-12 col-xl-12">
                                <label for="password" class="form-label">New Password <span class="text-danger">*</span></label>
                                <input 
                                    type="password" 
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="Enter your new password"
                                    required
                                />
                                <div class="invalid-feedback">
                                    New password is a required field.
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col-lg-12 col-xl-12">
                                <label for="password_confirmation" class="form-label">Confirm New Password <span class="text-danger">*</span></label>
                                <input 
                                    type="password" 
                                    id="password_confirmation"
                                    class="form-control"
                                    name="password_confirmation"
                                    placeholder="Reenter your new password"
                                    required
                                />
                                <div class="invalid-feedback">
                                    Confirm new password is a required field.
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary btn-sm px-4 mt-3 mb-0">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection