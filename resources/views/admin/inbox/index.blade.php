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
            <div class="card mb-3 pb-0">
                @if(count($emails) > 0)
                    <ul class="message-list">
                        @foreach($emails as $email)
                            <li>                                           
                                <div class="col-mail col-mail-1">
                                    <div class="checkbox-wrapper-mail">
                                        <input type="checkbox" id="chk19">
                                        <label for="chk19" class="toggle"></label>
                                    </div>
                                    <a href="{{ route('inbox.show', $email->id) }}">
                                        <p class="title">
                                            {{ $email->first_name }}&nbsp;{{ $email->last_name }}
                                        </p>
                                        <!-- <span class="star-toggle far fa-star"></span> -->
                                    </a>                                                     
                                </div>
                                <div class="col-mail col-mail-2">
                                    <a href="{{ route('inbox.show', $email->id) }}" class="subject">
                                        @if($email->is_read == 0)
                                            <span class="badge-soft-danger badge me-2">New</span>
                                        @endif
                                        {{ $email->message }}
                                    </a>
                                    <div class="date">{{ \Carbon\Carbon::parse($email->created_at)->toFormattedDateString() }}</div>
                                </div>                                           
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="p-3 pb-0 text-danger">Your inbox is empty</p>
                @endif
            </div> <!-- panel -->

            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-center">
                    {{ $emails->links() }}
                </div><!-- end Col -->
            </div> <!--end row-->
        </div> <!-- end col -->
    </div>
@endsection