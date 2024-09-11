<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Page d'erreur 404</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('back_auth/assets/img/logo.png') }}">

    <link rel="stylesheet" href="{{ asset('back_auth/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('back_auth/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_auth/assets/plugins/fontawesome/css/fontawesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('back_auth/assets/css/feathericon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_auth/assets/plugins/morris/morris.css') }}">

    <link rel="stylesheet" href="{{ asset('back_auth/assets/css/style.css') }}">

</head>

<body class="error-page">

    <div class="main-wrapper">
        <div class="error-box">
            <h1>403</h1>
            <h3 class="h2 mb-3"><i class="fas fa-exclamation-triangle"></i>Oops!! Acces non autorise ! </h3>
            <p class="h4 font-weight-normal">Vous avez pas les Abilitations necessaires pour acceder a cette partie du
                site</p>
            <a href="{{route('welcome')}}" class="btn btn-primary">Retounez a la page d'accueil</a>
        </div>
    </div>


    <script src="{{ asset('back_auth/assets/js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ asset('back_auth/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back_auth/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('back_auth/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>


    <script src="{{ asset('back_auth/assets/js/script.js') }}"></script>
</body>

</html>
