<!--
@born June 4, 2022
@author Rodrigo Brito <contato@rodrigobrito.dev.br>
-->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @metas
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <link rel="preload" href="{{ asset('site/css/app.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('site/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/boxicons/css/boxicons.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="spinner"></div>
            </div>
        </div>
    </div>

    <header class="top-header top-header-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="top-head-left">
                        <div class="top-contact">
                            <h3>Alameda dos Tupiniquins, nº 686, Moema, São Paulo, SP</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="top-header-right">
                        <div class="top-header-social top-header-social-bg">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100011897055201" target="_blank">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/fontedomel" target="_blank">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/fonte.do.mel/" target="_blank">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/5511985861944" target="_blank">
                                        <i class='bx bxl-whatsapp'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="navbar-area">
        <div class="mobile-nav">
            <a href="{{ route('home') }}" class="logo text-primary">
                <img src="{{ asset('img/logo.png') }}" width="200" height="200" alt="{{ env('APP_NAME') }}">
            </a>
        </div>

        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light ">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('img/logo.png') }}" width="170" height="170"
                            alt="{{ env('APP_NAME') }}">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="{{ route('home') }}"
                                    class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('products') }}"
                                    class="nav-link {{ Route::currentRouteName() == 'products' || Route::currentRouteName() == 'product' ? 'active' : '' }}">
                                    Produtos
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('bees') }}"
                                    class="nav-link {{ Route::currentRouteName() == 'bees' || Route::currentRouteName() == 'bee' ? 'active' : '' }}">
                                    Abelhas
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('recipes') }}"
                                    class="nav-link {{ Route::currentRouteName() == 'recipes' || Route::currentRouteName() == 'recipe' ? 'active' : '' }}">
                                    Receitas
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('contact') }}"
                                    class="nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
                                    Contato
                                </a>
                            </li>

                        </ul>
                        <div class="nav-side d-display">
                            <div class="nav-side-item">
                                <div class="get-btn">
                                    <a href="{{ env('APP_URL') . '/vendas' }}"
                                        class="default-btn btn-bg-two border-radius-5">Loja
                                        <i class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    @yield('content')


    <footer class="footer-area footer-bg2">
        <div class="container">
            <div class="footer-top pt-100 pb-70">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('img/logo.png') }}" width="200" height="200"
                                        alt="{{ env('APP_NAME') }}">
                                </a>
                            </div>
                            <p>
                                Aqui na Fonte do Mel você encontra produtos derivados de abelhas, tais como como mel,
                                cera, própolis, pólen, geleia real e apitoxina. Desfrute destes benefícios!
                            </p>
                            <div class="social-link">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/profile.php?id=100011897055201"
                                            target="_blank">
                                            <i class='bx bxl-facebook'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/fontedomel" target="_blank">
                                            <i class='bx bxl-twitter'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/fonte.do.mel" target="_blank">
                                            <i class='bx bxl-instagram'></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget pl-2">
                            <h3>Links</h3>
                            <ul class="footer-list">
                                <li>
                                    <a href="{{ route('home') }}">
                                        <i class='bx bx-chevron-right'></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}">
                                        <i class='bx bx-chevron-right'></i>
                                        Produtos
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('bees') }}">
                                        <i class='bx bx-chevron-right'></i>
                                        Abelhas
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('recipes') }}">
                                        <i class='bx bx-chevron-right'></i>
                                        Receitas
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">
                                        <i class='bx bx-chevron-right'></i>
                                        Contato
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('police') }}">
                                        <i class='bx bx-chevron-right'></i>
                                        Política de Privacidade
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="footer-widget pl-5">
                            <h3>Loja</h3>
                            <ul class="footer-list">
                                <li>
                                    <a href="{{ env('APP_URL') . '/vendas' }}" target="_blank">
                                        <i class='bx bx-chevron-right'></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ env('APP_URL') . '/vendas/loja' }}" target="_blank">
                                        <i class='bx bx-chevron-right'></i>
                                        Produtos
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <h3>Contato</h3>
                            <ul class="footer-contact-list">
                                <li>
                                    <i class="bx bxs-map"></i>
                                    <div class="content">
                                        <a href="#" style="pointer-events: none;cursor: default;">
                                            Alameda dos Tupiniquins, nº 686, Moema, São Paulo, SP
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <i class="bx bx-phone-call"></i>
                                    <div class="content">
                                        <a href="tel:(11) 2307-1900">
                                            (11) 2307-1900
                                        </a><br />
                                        <a href="tel:(11) 4117-3536">
                                            (11) 4117-3536
                                        </a><br />
                                        <a href="tel:(11) 98586-1944">
                                            (11) 98586-1944
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <i class="bx bx-message"></i>
                                    <div class="content">
                                        <a href="mailto:loja@fontedomel.com.br">
                                            loja@fontedomel.com.br
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="copy-right-area">
            <div class="copy-right-text">
                <p>
                    {{ env('APP_NAME') }} © 2015-{{ date('Y') }} -
                    Alameda dos Tupiniquins, 686, Moema, São Paulo, SP
                </p>
            </div>
        </div>
    </footer>


    <div class="switch-box">
        <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">
            <span class="slider round"></span>
        </label>
    </div>


    <script src="{{ asset('site/js/jquery.min.js') }}"></script>
    <script src="{{ asset('site/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('site/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('site/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('site/js/wow.min.js') }}"></script>
    <script src="{{ asset('site/js/mainmenu.js') }}"></script>
    <script src="{{ asset('site/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('site/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('site/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('site/js/custom.js') }}"></script>
</body>

</html>
