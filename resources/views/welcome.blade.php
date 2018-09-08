<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', __('Ajaweed')) }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app-rtl.css') }}" rel="stylesheet">

    <title>{{ config('app.name', __('Ajaweed')) }}</title>

</head>

<body dir="rtl" lang="ar">

<header id="page-hero" class="site-header d-flex flex-column align-content-between">

    <nav class="site-nav family-sans navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myTogglerNav"
                    aria-controls="myTogglerNav"
                    aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand text-uppercase" href="#page-hero">
                <img width="30" height="30" src="{{asset('images/site-logo.png')}}"
                     alt="Ajaweed"> {{ config('app.name') }}
            </a>

            <div class="collapse navbar-collapse justify-content-center" id="myTogglerNav">
                <div class="navbar-nav mx-auto font-weight-regular text-uppercase">
                    <a class="nav-item nav-link" href="#page-hero">الرئيسية</a>
                    <a class="nav-item nav-link" href="#page-about">نبذة</a>
                    <a class="nav-item nav-link" href="#page-mission">رسالتنا</a>
                    <a class="nav-item nav-link" href="#page-objectives">أهدافنا</a>
                    <a class="nav-item nav-link" href="#page-letter">كلمة أجاويد</a>
                    <a class="nav-item nav-link" href="#page-partners">شركاء النجاح</a>
                </div>

                <ul class="navbar-nav font-weight-regular text-uppercase">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="authDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user-circle fa-2x"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="authDropdown">
                            <a class="dropdown-item" href="{{ route('login') }}">@lang('Login')</a>
                            <a class="dropdown-item" href="{{ route('register') }}">@lang('Register')</a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <section class="layout-hero jumbotron jumbotron-fluid d-flex align-items-center mt-5 text-reverse">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-11 col-sm-10 col-md-8 fadeInUp">
                    <h3 class="page-section-title text-reverse">أجاويد</h3>
                    <p class="page-section-text lead">في كل مكان وزمان</p>
                    <a class="btn btn-outline-light" href="{{ url('/') }}">فعاليات أجاويد</a>
                </div>
            </div>
        </div>
    </section>

</header>


<div id="app"></div>

</body>
</html>
