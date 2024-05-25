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
                    <h4 class="card-title">Meta Tags List</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Page</th>
                                    <th>Title</th>
                                    <th>Keywords</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($metatags) > 0)
                                    @foreach($metatags as $key => $meta)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <a href="#">{{ $meta->page }}</a>
                                            </td>
                                            <td>
                                                {{ $meta->title }}
                                            </td>
                                            <td>
                                                @if(isset($meta->keywords))    
                                                    <?php
                                                        $keywords = explode(",", $meta->keywords);
                                                    ?>
                                                    @if(count($keywords) > 0)
                                                        @foreach($keywords as $keyword)
                                                            <span class="badge bg-soft-primary">{{ $keyword }}</span>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="text-end">                                                       
                                                <a href="{{ route('metatags.edit', $meta->id) }}">
                                                    <i class="las la-pen text-secondary font-16"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No meta tags found!</td>
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