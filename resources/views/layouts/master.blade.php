<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        @yield('assets')
    </head>
    <body>
        @yield('header')
        <div class="content">
            @yield('content')
        </div>
        @yield('footer')
    </body>
</html>
