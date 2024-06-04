<head>
    <meta charset="utf-8" />
    <title>Georgia Construction Co.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="Georgia Construction Company" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicons/Dark.png') }}">

    <!-- App CSS -->
    @vite('resources/css/app.css')
    @yield('style')
</head>
