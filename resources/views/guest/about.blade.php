@extends('layouts.guest')

@section('content')

    <!-- Slider section -->
    @include('guest.inc.slider', ['slides' => $slides])

    <!-- Content section -->
    @include('guest.inc.company-intro')

    <!-- Core values section -->
    @include('guest.inc.core-values')

    <!-- Why choose us section -->
    @include('guest.inc.why-choose-us')

    <!-- Certifications section -->
    @include('guest.inc.certifications')

@endsection