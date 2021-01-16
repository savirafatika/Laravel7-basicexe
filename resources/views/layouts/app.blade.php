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
</body>

</html>
