@extends('layouts.guest')

@section('content')

    <!-- Banner section -->
    @include('guest.inc.banner', ['banner' => 'banner-4.png'])

    <section class="content-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="font-36 font-weight-bold mb-4 pb-2">Projects & Portfolio</h2>
                </div>
            </div>
            <!-- Projects & Portfolios section -->
            @include('guest.inc.portfolio', ['categories' => $categories, 'projects' => $projects])
        </div>
    </section>

@endsection