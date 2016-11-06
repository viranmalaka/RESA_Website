<html>
<head>
    @include('partials._head')
</head>

<body>
    @include('partials._navbar')

    @include('partials._session')

    @if(Auth::check())
        {{ Auth::user()['name'] }}
    @else
        Log out
    @endif

    @yield('body')


    @include('partials._footer')

    @include('partials._script')
</body>

</html>