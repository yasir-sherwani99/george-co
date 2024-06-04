@extends('layouts.guest')

@section('content')

    <!-- Slider section -->
    @include('guest.inc.slider', ['slides' => $slides])

    <!-- Services section -->
    @include('guest.inc.services-details', ['services' => $services])

@endsection