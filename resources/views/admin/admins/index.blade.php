@extends('layouts.admin')

@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success fade show" role="alert">
            <strong>Welldone! </strong>
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">                      
                            <h4 class="card-title">Admin List</h4>             
                        </div><!--end col-->                                       
                    </div>  <!--end row-->                                  
                </div><!--end card-header-->
                <div class="card-body">                                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>  
                                    <th>Action</th>
                                </tr><!--end tr-->
                            </thead>
                            <tbody>
                                @if(count($admins) > 0)
                                    @foreach($admins as $key => $admin)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img 
                                                    src="{{ asset($admin->photo) }}" 
                                                    alt="{{ $admin->name }}" 
                                                    class="thumb-sm rounded-circle me-2"
                                                    onerror="this.onerror=null;this.src='{{ asset('admin-assets/images/users/user-vector.png') }}';" 
                                                />
                                                {{ $admin->name }}
                                            </td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                @if($admin->status == 'active')
                                                    <span class="badge badge-soft-success">Active</span>
                                                @else
                                                    <span class="badge badge-soft-danger">Blocked</span>
                                                @endif
                                            </td>
                                            <td>                          
                                                <form 
                                                    action="{{ route('admins.destroy', $admin->id) }}" 
                                                    method="post"
                                                    onsubmit="return confirm('Are you sure?');"
                                                >                             
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('admins.edit', $admin->id) }}">
                                                        <i class="las la-pen text-secondary font-16"></i>
                                                    </a>
                                                    @if($admin->is_super_admin == 0)
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            <i class="las la-trash-alt text-secondary font-16"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr><!--end tr-->                          
                                    @endforeach
                                @else 
                                    <tr>
                                        <td colspan="5">No admin found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>                    
                    </div>  
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('admins.create') }}">
                                <button class="btn btn-outline-light btn-sm px-4 ">+ Add New</button>
                            </a>
                        </div><!--end col-->      
                    </div><!--end row-->                                     
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col-->                               
    </div><!--end row-->

@endsection