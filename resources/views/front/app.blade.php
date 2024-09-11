<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('front._patials.styles')
</head>
<body>

    <!-- Topbar debut -->
        @include('front._partials.topbar')
    <!-- Topbar fin -->

    <!-- Navbar debut -->
        @include('front._partials.header')
    <!-- Navbar fin -->

    

    @yield('content')
    
    @include('front._partials.scripts')
</body>
</html>