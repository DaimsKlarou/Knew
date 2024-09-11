<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>@yield('title')</title>
    @include('back._partials.styles')

    <x-head.tinymce-config/>
</head>

<body>

    <div class="main-wrapper">
        @include('back._partials.header')
        @include('back._partials.sidebar')
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    @yield('header-content')
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    @include('back._partials.scripts')

    @if (session()->get('error'))
        <script>
            iziToast.error({
                title: 'Error',
                position: "topRight",
                message: "{{ session()->get('error') }}",
            });
        </script>
    @endif

    @if (session()->get('success'))
        <script>
            iziToast.success({
                title: 'Success',
                position: 'topRight',
                message: "{{ session()->get('success') }}",
            });
        </script>
    @endif
</body>

</html>
