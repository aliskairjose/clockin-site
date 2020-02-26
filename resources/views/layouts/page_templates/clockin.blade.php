<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>

<body>

    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

            {{-- HEADER --}}
            @include('layouts.navbars.navs.header')
            {{-- END HEADER --}}

            <div class="app-main">
                {{-- LEFT SIDE --}}
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                    data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button"
                                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li>
                                    <a href="{{url('home')}}">
                                        <i class="metismenu-icon pe-7s-graph2">
                                        </i>Home
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- END LEFT SIDE --}}

                {{-- RIGTH SIDE --}}
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        @yield('content')
                    </div>

                    {{-- FOOTER --}}
                    @include('layouts.footers.footer')
                </div>
                {{-- RIGTH SIDE --}}
            </div>
            </!doctype>
            <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    </body>
</body>

</html>
