<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') | INGENIERIA ECONOMICA</title>
        <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
        <script src="{{asset('js/jquery.min.js')}}"></script>
        @yield('head')
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <div class="container">
            @include('template.header')
            @include('template.alert')
            @yield('content')
        </div>
        <footer>
            <h4>UNIVERSIDAD DISTRITAL FRANCISCO JOSÉ DE CALDAS</h4>

            <h5>FACULTAD TECNOLÓGICA</h5>

            <h6>INGENIERÍA EN TELEMÁTICA TEORÍA GENERAL DE SISTEMAS</h6>

            <p>BOGOTÁ D.C.</p>
            <p>2016</p>
            </h6>
        </footer>
        <script src="asset('js/bootstrap.min.js')"></script>
        @yield('script')
    </body>
</html>
