@extends('layouts.admin')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success fade show" role="alert">
            <strong>Welldone! </strong>
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="media mb-4">
                        <img 
                            class="d-flex me-2 rounded-circle thumb-md" 
                            src="{{ asset('admin-assets/images/users/user-vector.png') }}" 
                            alt="Georgia Construction"
                        >
                        <div class="media-body align-self-center">
                            <h5 class="font-14 m-0">{{ $email->first_name }}&nbsp;{{ $email->last_name }}</h5>
                            <small class="text-muted">{{ $email->email }}</small>,
                            <small class="text-muted">{{ $email->phone }}</small>
                        </div>
                    </div>
                    <h4 class="mt-0 font-15">{{ ucfirst($email->subject) }} Inquiry</h4>
                    {{ $email->message }}
                    <hr/>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection