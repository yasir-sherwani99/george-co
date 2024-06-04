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
                    <h4 class="card-title">Sliders List</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Heading</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($sliders) > 0)
                                    @foreach($sliders as $key => $slider)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img 
                                                    src="{{ asset($slider->image) }}" 
                                                    alt="{{ $slider->heading }}" 
                                                    height="40"
                                                    onerror="this.onerror=null;this.src='{{ asset('admin-assets/images/default/noimage.png') }}';" 
                                                />
                                                <p class="d-inline-block align-middle mb-0 ms-1">
                                                    <a href="#">{{ $slider->heading }}</a>
                                                </p>
                                            </td>
                                            <td>
                                                @if($slider->is_active == 1)
                                                    <span class="badge badge-soft-success">Active</span>
                                                @else
                                              <span class="badge badge-soft-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-end">                                                       
                                                <form 
                                                    action="{{ route('sliders.destroy', $slider->id) }}" 
                                                    method="post"
                                                    onsubmit="return confirm('Are you sure?');"
                                                >                             
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('sliders.edit', $slider->id) }}">
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
                                        <td colspan="5" class="text-center">No slider found!</td>
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