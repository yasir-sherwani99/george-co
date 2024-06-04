@extends('layouts.guest')

@section('content')

    <!-- Slider section -->
    @include('guest.inc.slider', ['slides' => $slides])

    <!-- Content section -->
    @include('guest.inc.content-home')

    <!-- Services section -->
    @include('guest.inc.services-home', ['services' => $services])

    <!-- Project section -->
    @include('guest.inc.project-home')

    <!-- clients section -->
    @include('guest.inc.clients')

    <!-- Certifications section -->
    @include('guest.inc.certifications')

@endsection