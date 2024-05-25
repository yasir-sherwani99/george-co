@extends('layouts.guest')

@section('content')

    <!-- Banner section -->
    @include('guest.inc.banner', ['banner' => 'banner-2.png'])

    <!-- Content section -->
    @include('guest.inc.company-intro')

    <!-- Core values section -->
    @include('guest.inc.core-values')

    <!-- Why choose us section -->
    @include('guest.inc.why-choose-us')

    <!-- Certifications section -->
    @include('guest.inc.certifications')

@endsection