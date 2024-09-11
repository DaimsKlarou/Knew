<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    @include('front._partials.styles')
    <!-- Fin des lien du head -->
</head>

<body>
    <!-- Debut Topbar -->
    @include('front._partials.topbar')
    <!-- Topbar fin -->

    <!-- Navbar debut -->
    @include('front._partials.header')
    <!-- Navbar fin -->

    <br />
    <!-- Breaking News Start -->
    @yield('content-breaking')
    <!-- Breaking News End -->

    <!-- Main News Slider Debut -->
    @yield('content-main')
    <!-- News Slider fin -->

    <!-- Featured News Slider debut -->
    @yield('content-featured')
    <!-- Featured News Slider fin -->

    <!-- News With Sidebar debut -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @yield('content-news')
                    </div>
                </div>
                <!-- debut sidebar -->
                @include('front._partials.sidebar')
                <!-- fin sidebar -->
            </div>
        </div>
    </div>
    <!-- News With Sidebar fin -->

    <!-- Footer debut -->
    @include('front._partials.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-info btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    @include('front._partials.scripts')
</body>

</html>
