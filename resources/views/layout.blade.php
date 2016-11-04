<html>
<head>
    <title>RESA - @yield('title')</title>
</head>

<body>

    @if (Session::has('success'))

        <div class="alert alert-success" role="alert">
            <strong>Success:</strong> {{ Session::get('success') }}
        </div>

    @endif
    @if (Session::has('rejected'))

        <div class="alert alert-success" role="alert">
            <strong>Rejected:</strong> {{ Session::get('rejected') }}
        </div>

    @endif


    @if(Auth::check())
        {{ Auth::user()['name'] }}
    @else
        Log out
    @endif
    @yield('body')
</body>

</html>