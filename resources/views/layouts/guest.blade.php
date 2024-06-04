<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('layouts.partials._guest_head')

<body>
    <!-- Preloader start -->
    @include('layouts.inc.loader')
    <!-- Preloader end -->
    <div class="wrapper">
        <div class="header">
            <!-- Top bar start -->
            @include('layouts.partials._topbar')
            <!-- Top bar ends -->
            <!-- Logo bar start -->
            @include('layouts.partials._logobar')
            <!-- Logo bar ends -->
            <!-- Nav bar start -->
            @include('layouts.partials._navbar')
            <!-- Nav bar ends -->
        </div>

        @yield('content')
        
        <footer>
            <!-- Top footer start -->
            @include('layouts.partials._topfooter')
            <!-- Top footer ends -->
            <!-- Bottom footer start -->
            @include('layouts.partials._bottomfooter')
            <!-- Bottom footer ends -->
        </footer>
    </div>

    @vite('resources/js/app.js')
    @yield('script')
</body>
</html>