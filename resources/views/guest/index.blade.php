@extends('layouts.guest')

@section('content')

    <!-- Banner section -->
    @include('guest.inc.banner', ['banner' => 'banner-1.png'])

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