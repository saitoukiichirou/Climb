<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- ローカル環境時 --}}
@if(app('env')=='local')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- bootstrap4 ver.normal enable-->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/03be82f655.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/like.js') }}"></script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
</head>
@endif


{{--本番環境時--}}
@if(app('env')=='production')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">

    <!-- bootstrap4 ver.normal enable-->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="{{ secure_asset('js/like.js') }}"></script>
    <script src="https://kit.fontawesome.com/03be82f655.js" crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

</head>
@endif

<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">


                    <!-- Authentication Links -->
                    {{--                    ゲストユーザ用表示メニュー--}}
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item nav-item-right">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item nav-item-right">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif

                    @else
                        {{--                    ゲストユーザ用表示メニュー終わり--}}

                        <li class="nav-item nav-item-right">
                            <a href="{{ route('home') }}" class="nav-link {{url()->current()==route('home')? 'active' : ''}}">
                                <i class="fas fa-home pr-2"></i><span> ホーム</span>
                            </a>
                        </li>

                        <li class="nav-item nav-item-right">
                            <a href="{{ route('scores.index') }}" class="nav-link {{url()->current()==route('scores.index')? 'active' : ''}}">
                                <i class="fa-solid fa-circle-check pr-2"></i><span> スコア表</span>
                            </a>
                        </li>

                        {{--                    管理者のみ表示メニュー--}}
                        @can('admin')
                            <li class="nav-item nav-item-right">
                                <a href="{{ route('users_list.index') }}" class="nav-link {{url()->current()==route('users_list.index')? 'active' : ''}}">
                                    <i class="fa-solid fa-address-book pr-2"></i><span> 会員名簿</span>
                                </a>
                            </li>
                            <li class="nav-item nav-item-right">
                                <a href="{{ route('records.index') }}" class="nav-link {{url()->current()==route('records.index')? 'active' : ''}}">
                                    <i class="fa-solid fa-pen-to-square pr-2"></i><span> 利用記録</span>
                                </a>
                            </li>
                            <li class="nav-item nav-item-right">
                                <a href="{{ route('problems.index') }}" class="nav-link {{url()->current()==route('problems.index')? 'active' : ''}}">
                                    <i class="fa-solid fa-file-lines"></i><span> 課題管理</span>
                                </a>
                            </li>
                        @endcan
                        {{--                    管理者メニュー終わり--}}

                        <li class="nav-item nav-item-right dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-user-pen pl-2"></i>{{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @can('admin')
                                <a class="dropdown-item" href="{{ route('users_list.show', Auth::id()) }}">
                                    {{ __('登録情報編集') }}
                                </a>
                                @endcan

{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}

{{--                            </div>--}}

{{--                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    {{--メインコンテンツ--}}
    <main class="py-4">
        @yield('content')
    </main>
    {{--メインコンテンツ終わり--}}
</div>
</body>
</html>
