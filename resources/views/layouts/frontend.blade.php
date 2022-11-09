<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Job Portal') | Job Portal</title>
    <meta name="keywords" content="@yield('meta_keywords', 'some default keywords')">
    <meta name="description" content="@yield('meta_description', 'default description')">
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Job Portal
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

        <main class="py-4" style="min-height: 90vh">
            @yield('content')
        </main>

        <!-- footer section -->
        <footer class="border-top">
            <section class="container">
                <div class="row  py-5">
                    <div class="col-md-3">
                        <h4 class="mb-4">Job Portal</h4>
                        <a href="#"> <i class="fab fa-facebook-square" style="font-size: 24pt;"></i></a>
                        <a href="#"> <i class="fab fa-linkedin"
                                style="font-size: 24pt; margin-left: 10px;"></i></a>
                        <a href="#"> <i class="fab fa-instagram-square"
                                style="font-size: 24pt; margin-left: 10px;"></i></a>
                        <a href="#"> <i class="fab fa-youtube-square"
                                style="font-size: 24pt; margin-left: 10px;"></i></a>
                        <p class="my-3">For Problem: 01625-888437</small><br />
                    </div>
                    <div class="col-md-3">
                        <h4>Address</h4>
                        <p>contact: 01625-888437</small><br />
                        <p>email: <a href="mailto:hrifat450@gmail.com" target="_blank">
                                hrifat450@gmail.com</a></small><br />
                        <p>Jatiya Kabi Kazi Nazrul Islam University. Trishal, Mymensingh</small><br />
                    </div>
                    <div class="col-md-3">
                        <h4>Community</h4>
                        <small><a href="#"> SSC Crash Course </a> </small><br />
                        <small><a href="#"> HSC Crash Course</a> </small><br />
                        <small><a href="#"> Pre Admission Medical</a> </small><br />
                        <small><a href="#"> University Admission</a> </small><br />
                    </div>
                    <div class="col-md-3">
                        <h4>Popular</h4>
                        <small><a href="#">Web Design and Development</a> </small><br />
                        <small><a href="#">Microsoft Powerpoint</a> </small><br />
                        <small><a href="#">Facebook Marketing</a> </small><br />
                        <small><a href="#">Spoken English</a> </small><br />
                        <small><a href="#">English Grammer</a> </small><br />
                    </div>
                </div>
                <div class="py-3 text-center">
                    Copyright © 2022, Job Portal, Inc. Developed by Muhammad Rifat.
                </div>
            </section>
        </footer>
    </div>
</body>

</html>
