@extends('layouts.admin')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success fade show" role="alert">
            <strong>Welldone! </strong>
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Services List</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($services) > 0)
                                    @foreach($services as $key => $service)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img 
                                                    src="{{ asset($service->images[0]->src) }}" 
                                                    alt="{{ $service->title }}" 
                                                    height="40"
                                                    onerror="this.onerror=null;this.src='{{ asset('admin-assets/images/users/user-vector.png') }}';" 
                                                />
                                                <p class="d-inline-block align-middle mb-0 ms-1">
                                                    <a href="#">{{ $service->title }}</a>
                                                </p>
                                            </td>
                                            <td>
                                                @if($service->is_active == 1)
                                                    <span class="badge badge-soft-success">Active</span>
                                                @else
                                                    <span class="badge badge-soft-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-end">                                                       
                                                <form 
                                                    action="{{ route('services.destroy', $service->id) }}" 
                                                    method="post"
                                                    onsubmit="return confirm('Are you sure?');"
                                                >                             
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('services.edit', $service->id) }}">
                                                        <i class="las la-pen text-secondary font-16"></i>
                                                    </a>
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="las la-trash-alt text-secondary font-16"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No service found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div>
@endsection