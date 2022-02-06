<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/asset/favicon.ico') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- tag Manager --}}
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MBKGK6M');</script>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/7741405192.js" crossorigin="anonymous"></script>
    <script src="/js/utility.js"></script>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/overwrite.css') }}" rel="stylesheet">
    @yield("headerScript") {{-- header内でcss,js読み込み --}}
</head>

<body>
    {{-- tag Manager --}}
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MBKGK6M"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    {{-- loding --}}
    <div id="loading">
        <div class="cv-copy">
            <h2>loading...</h2>
        </div>
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <div id="app">
        {{-- headder --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            {{-- top navi --}}
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                {{-- Left Side Of Navbar --}}
                <ul class="navbar-nav ml-auto">
                    <li>
                        <form method="get" action="{{ route('user.search') }}" class="search_container" maxlength="30">
                            <input required type="text" name="searchQuery" size="25" placeholder="ユーザー検索"
                                value="{{ old('searchQuery') }}">
                            <input class="fas" type="submit" value="&#xf002">
                        </form>

                    </li>
                </ul>

                <div id="navbarSupportedContent">
                    {{-- Right Side Of Navbar --}}
                    <ul class=" navbar-nav" id="menu">
                        {{-- Authentication Links --}}
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">新規登録</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" id="dropdown-menu"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
            {{-- extend navi --}}
            @yield('extendNavi')
        </nav>
        {{-- <x-alert :type="$type_alert ?? ''" :message="$message_alert ?? ''"/> --}}
        @include('components.alert')
        {{-- body --}}
        <main class="py-4">
            @yield('content')
        </main>
        {{-- footer --}}
        <footer  class="footer">
            <div class="container">
                <div>© 2020 starBreak</div>
                <ul id="footer-contents">
                    <li><a href="{{ route('userPolicy') }}">利用規約</a></li>
                    <li><a href="{{ route('privacyPolicy') }}">プライバシーポリシー</a></li>
                    <li><a href="{{ route('contact') }}">お問合せ</a></li>
                </ul>
            </div>
        </footer>
    </div>
</body>

</html>
@yield("laterScript") {{--後で読ませたいスクリプト --}}