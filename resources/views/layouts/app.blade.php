<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Laravel 7' }}</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> asset('m=tampilkan image') --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    @yield('head')
</head>

<body>
    @include('layouts.navigation')
    <div class="py-4">

        @include('alert')

        @yield('content')
    </div>

    @yield('script')

    <script src="http://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>
