<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/simplebar/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />

    <!-- No Extra plugin used -->
    <link href='assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css' rel='stylesheet'>
    <link href='assets/plugins/daterangepicker/daterangepicker.css' rel='stylesheet'>


    <link href='assets/plugins/toastr/toastr.min.css' rel='stylesheet'>







    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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

        <div class="wrapper">

            <!--
                ====================================
                ——— LEFT SIDEBAR WITH FOOTER
                =====================================
              -->
            <aside class="left-sidebar bg-sidebar">
                <div id="sidebar" class="sidebar sidebar-with-footer">
                    <!-- Aplication Brand -->
                    <div class="app-brand">
                        <a href="/admin/index.php">
                            <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"
                                width="30" height="33" viewBox="0 0 30 33">
                                <g fill="none" fill-rule="evenodd">
                                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                                </g>
                            </svg>
                            <span class="brand-name">Sciences University</span>
                        </a>
                    </div>
                    <!-- begin sidebar scrollbar -->
                    <div class="sidebar-scrollbar">

                        <!-- sidebar menu -->
                        <ul class="nav sidebar-inner" id="sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="/admin/users/index.php?page=1">
                                    <i class="mdi mdi-account-group"></i>
                                    <span class="nav-text">Users</span> <b class="caret"></b>
                                </a>

                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="/admin/news?page=1">
                                    <i class="mdi mdi-newspaper"></i>
                                    <span class="nav-text">
                                      <div>
                                        @if (Auth::user()->affiliate_id)
                                            <input type="text" readonly="readonly"
                                                value="{{ url('/') . '/?ref=' . Auth::user()->affiliate_id }}">
                                        @endif
                                    </div>
                                  </span> <b class="caret"></b>
                                    
                                </a>

                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="/admin/events?page=1">
                                    <i class="mdi mdi-view-dashboard-outline"></i>
                                    <span class="nav-text">Events</span> <b class="caret"></b>
                                </a>

                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="/admin/sliders/index.php?page=1">
                                    <i class="mdi mdi-page-next-outline"></i>
                                    <span class="nav-text">Hero Slider</span> <b class="caret"></b>
                                </a>

                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="/admin/nav_links/index.php?page=1">
                                    <i class="mdi mdi-link-variant"></i>
                                    <span class="nav-text">Navbar Links</span> <b class="caret"></b>
                                </a>

                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="/admin/social_links/index.php?page=1">
                                    <i class="mdi mdi-link-variant"></i>
                                    <span class="nav-text">Social Links</span> <b class="caret"></b>
                                </a>

                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="/admin/messages/index.php?page=1">
                                    <i class="mdi mdi-message-outline"></i>
                                    <span class="nav-text">Messages</span> <b class="caret"></b>
                                </a>

                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="/admin/meta_contents/index.php?page=1">
                                    <i class="mdi mdi-settings-outline"></i>
                                    <span class="nav-text">Site Settings</span> <b class="caret"></b>
                                </a>
                            </li>
                        </ul>

                    </div>

                    <hr class="separator" />

                    <!-- <div class="sidebar-footer">
                      <div class="sidebar-footer-content">
                          <h6 class="text-uppercase">
                              Cpu Uses <span class="float-right">40%</span>
                          </h6>
                          <div class="progress progress-xs">
                              <div class="progress-bar active" style="width: 40%;" role="progressbar"></div>
                          </div>
                          <h6 class="text-uppercase">
                              Memory Uses <span class="float-right">65%</span>
                          </h6>
                          <div class="progress progress-xs">
                              <div class="progress-bar progress-bar-warning" style="width: 65%;" role="progressbar"></div>
                          </div>
                      </div>
                  </div> -->
                </div>
            </aside>

            <div class="page-wrapper">
                <!-- Header -->
                <header class="main-header " id="header">
                    <nav class="navbar navbar-static-top navbar-expand-lg justify-content-between">
                        <!-- Sidebar toggle button -->
                        <button id="sidebar-toggler" class="sidebar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                        </button>
                        <!-- search form -->


                        <div class="navbar-right ">
                            <ul class="nav navbar-nav">


                                <!-- User Account -->
                                <li class="dropdown user-menu">
                                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                        <img src="/images/user.png" class="user-image" alt="User Image" />
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <!-- User image -->
                                        <li class="dropdown-header">
                                            <img src="/images/user.png" class="user-image" alt="User Image" />
                                            <div class="d-inline-block">
                                            </div>
                                        </li>


                                        <li>
                                            <i class="mdi mdi-settings"></i> Account Setting </a>
                                        </li>

                                        <li class="dropdown-footer">
                                            <a href="/admin/users/logout.php"> <i class="mdi mdi-logout"></i> Log Out
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>


                </header>

                <!--
          </div>
      </div> -->
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
</body>

</html>
