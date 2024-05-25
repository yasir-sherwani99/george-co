@extends('layouts.guest')

@section('content')

    <!-- Contact-form section -->
    <section class="contact-form-sec border">
        <div class="container container-small">
            <div class="form-box">
                <div class="row">
                    <div class="col-lg-5">
                        @include('guest.inc.contact-details')
                    </div>
                    <div class="col-lg-7">
                        @include('guest.inc.contact-form')
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection