<!doctype html>
<html lang="en">
    <head>
        <title>PSM</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="{{url('/')}}"> @yield('before-base-css')
        <link href="{{url(mix('css/front/app.css'))}}" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.png')}}" /> @yield('before-base-js')
        <script type="text/javascript">
            if (window.devicePixelRatio > 1) { document.cookie = 'HTTP_IS_RETINA=1;path=/'; }
        </script>
        @yield('after-base-js')
    </head>
    <body>
        <div id="app" class="frontlayout">
            <front-header></front-header>
            <router-view></router-view>
            <front-footer></front-footer>
        </div>
        <script src="{{ asset('js/front-app.js') }}"></script>
    </body>
</html>