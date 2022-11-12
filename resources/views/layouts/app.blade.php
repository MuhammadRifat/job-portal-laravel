<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .hoverPrimary:hover {
            background-color: lightgray !important;
            color: black !important;
            transition: all .3s ease !important;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div id="app">

        <!-- Sidebar for mobile screen -->
        <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel" style="width: 220px;">
            <div class="offcanvas-header text-white">
                <div class="px-2 d-flex justify-content-center">
                    <a href="/">
                        <img src="../images/default-monochrome.svg" alt="" width="90%">
                    </a>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <ul class="px-2">
                    <li><a class="bg-secondary mt-2 p-2 rounded d-block text-white hoverPrimary" href="/admin/"><i
                                class="fas fa-table"></i> Dashboard</a></li>
                    <li><a class="bg-secondary mt-1 p-2 rounded d-block text-white hoverPrimary"
                            href="/admin/add-course.php"><i class="fas fa-plus-square"></i> Add Course</a></li>
                    <li><a class="bg-secondary mt-1 p-2 rounded d-block text-white hoverPrimary"
                            href="/admin/manage-course.php"><i class="fas fa-tasks"></i> Manage Course</a></li>
                    <li><a class="bg-secondary mt-1 p-2 rounded d-block text-white hoverPrimary"
                            href="/admin/add-category.php"><i class="fas fa-plus-square"></i> Add Category</a></li>
                    <li><a class="bg-secondary mt-1 p-2 rounded d-block text-white hoverPrimary"
                            href="/admin/manage-category.php"><i class="fas fa-tasks"></i> Manage Category</a></li>
                    <li><a class="bg-secondary mt-1 p-2 rounded d-block text-white hoverPrimary"
                            href="/admin/pending-payment.php"><i class="fas fa-plus"></i> Pending Payment</a></li>
                    <li><a class="bg-secondary mt-1 p-2 rounded d-block text-white hoverPrimary"
                            href="/admin/approved-payment.php"><i class="fas fa-users"></i> Approved Payment</a></li>
                    <li><a class="bg-secondary mt-1 p-2 rounded d-block text-white hoverPrimary"
                            href="/admin/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="row m-0">
            <div class="col-lg-2 bg-dark p-0 d-none d-lg-block" style="min-height:110vh;">
                <h4 class="text-center py-3 fw-bold border-bottom">
                    <a class="text-white text-decoration-none" href="{{ url('/dashboard') }}">
                        Dashboard
                    </a>
                </h4>

                {{-- navigation link --}}
                <ul class="px-2">
                    <li><a class="bg-secondary mt-2 p-2 rounded d-block text-white hoverPrimary"
                            href="{{ url('dashboard') }}"><i class="fas fa-table"></i> Home</a></li>
                    <li>
                        <a class="bg-secondary mt-1 p-2 rounded d-block text-white hoverPrimary"
                            href="{{ url('/dashboard/job-category') }}"><i class="fas fa-plus-square"></i> Job
                            Category</a>
                    </li>
                    <li>
                        <a class="bg-secondary mt-1 p-2 rounded d-block text-white hoverPrimary"
                            href="{{ url('/dashboard/employer') }}"><i class="fas fa-plus-square"></i> Employers</a>
                    </li>

                    <li><a class="bg-secondary mt-1 p-2 rounded d-block text-white hoverPrimary"
                            href="{{ url('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </div>
            <div class="col-lg-10 p-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                    <div class="container-fluid">
                        <div>
                            <button class="btn text-dark fs-4 header-none d-block d-lg-none" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                                aria-controls="offcanvasExample">
                                <i class="fas fa-bars"></i> Menu
                            </button>
                        </div>

                        <div>

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
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
