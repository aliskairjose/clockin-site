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
                @if (Auth::user()->role_id == '1')
                    @include('layouts.navbars.sidebar.root')
                @endif
                @if (Auth::user()->role_id == '2')
                    @include('layouts.navbars.sidebar.admin')
                @endif
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
