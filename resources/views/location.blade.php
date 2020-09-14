<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jizelle</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.svg') }}">

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700;800&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
</head>
<body>
<div class="preloader">
    <div class="row h-100 align-items-center justify-content-center">
        <img class="img-fluid" src="{{ asset("images/logo.svg") }}" alt="">
    </div>
</div>

<div class="" id="app">
    <div class="container">
        <div class="row align-items-center justify-content-center" style="min-height: 100vh">
            <div class="text-center">
                <img src="{{ asset('images/logo.svg') }}" alt="">
                <p class="font-size-20 font-weight-light">
                    Показ сайта запрещен в вашем регионе
                </p>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/app.js') }}"></script>
<script>
    function preloader() {
                $('.preloader').fadeOut('slow').delay(1000);

    }
</script>
<script>
    setTimeout(preloader, 500);
</script>
</body>
</html>