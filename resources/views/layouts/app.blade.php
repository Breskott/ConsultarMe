<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @toastr_css
    <title>{{ config('app.name', 'ConsultarMe') }} | @yield('title')</title>
    <meta content="Sistema de Consultas de Agendamento para munícipes de Tarumã - SP" name="description">
    <meta content="Sistema, Consulta, Médico, Tarumã-SP, Agendamento, Agendamento Online" name="keywords">

    <!-- Meta Adsense/Search Tag -->
    <meta property="og:title" content="{{ config('app.name', 'ConsultarMe') }} | @yield('title')"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="@yield('og_image')"/>
    <meta property="og:description" content="@yield('description')"/>
    <meta property="og:site_name" content="{{ config('app.name', 'ConsultarMe') }}"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/@fortawesome/fontawesome-pro/css/all.min.css') }}" rel="stylesheet">

    <!-- CSS Principal -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
<!-- ======= Menu ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span>Consultar<span style="color: #0d6efd !important;">Me</span></span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto {{ request()->is('home*') ? 'active' : '' }}" href="{{ route('home') }}/#hero">Início</a></li>
                <li><a class="nav-link scrollto {{ request()->is('home/#postos') ? 'active' : '' }}" href="{{ route('home') }}/#postos">Postos de Sáude</a></li>
                @if(!Auth::check())
                    <li><a class="nav-link scrollto {{ request()->is('login*') ? 'active' : '' }}" href="{{ route('login') }}">Entrar</a></li>
                    <li><a class="getstarted scrollto {{ request()->is('register*') ? 'active' : '' }}" href="{{ route('register') }}">Cadastro</a></li>
                @else
                    <li><a class="nav-link scrollto {{ request()->is('painel*') ? 'active' : '' }}" href="{{ route('painel') }}">Painel do Sistema</a></li>
                    <li><a class="nav-link scrollto {{ request()->is('logout*') ? 'active' : '' }}" href="{{ route('logout') }}">Sair</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>

<main id="main">
    @yield('content')
</main>

<!-- ======= Rodape ======= -->
<footer id="footer" class="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-12 footer-info">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                        <img src="assets/img/logo.png" alt="">
                        <span>Consultar<span style="color: #0d6efd !important;">Me</span></span>
                    </a>
                    <p>O ConsultarMe surgiu através de uma ideia em nosso Projeto da Faculdade que foi idealizado pelo grupo de Tarumã - SP</p>
                </div>

                <div class="col-lg-4 col-6 footer-links">
                    <h4>Links Úteis</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}">Início</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Consultas</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('login') }}">Entrar</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('register') }}">Cadastro</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-6 footer-links">
                    <h4>Agradecimentos a Prefeitura de Tarumã</h4>
                    <a href="https://www.taruma.sp.gov.br/" target="_blank" class="logo d-flex align-items-center">
                        <img src="assets/img/prefeitura_rodape.png" alt="">
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; {{ now()->year }} - {{ config('app.name', 'ConsultarMe') }} <i class="fa fa-heart" style="color: #D50000;"></i>
            <a href="" target="_blank"> Projeto P.I Univesp - Tarumã/SP </a>
        </div>
    </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@jquery
@toastr_js
@toastr_render

<!-- JS -->
<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<!-- Mask form -->
<script src="{{ asset('assets/js/jquery_mask/jquery.mask.min.js') }}"></script>
<!-- JS Principal -->
<script src="{{ asset('assets/js/main.js') }}"></script>

@yield('script_inject')
</body>

</html>
