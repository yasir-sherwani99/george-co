@extends('layouts.guest')

@section('content')

    <!-- Banner section -->
    @include('guest.inc.banner', ['banner' => 'banner-3.png'])

    <!-- Services section -->
    @include('guest.inc.services-details', ['services' => $services])

@endsection