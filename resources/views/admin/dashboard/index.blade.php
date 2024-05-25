@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <h5 class="mt-0">
                        Welcome To Georgia Construction Co.
                        <button 
                            type="button" 
                            class="btn btn-sm btn-outline-secondary"
                            onclick="
                                event.preventDefault(); 
                                document.getElementById('admin-logout-form').submit();
                            "
                        >
                            <i class="mdi mdi-power me-2"></i>logout
                        </button>
                    </h5>
                    <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div><!--end col-->

        <div class="col-lg-6 text-end">
            <div class="text-end">
                
            </div>                            
        </div><!--end col-->
    </div><!--end row-->
@endsection
