<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') | INGENIERIA ECONOMICA</title>
        <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
        <script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
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
        <br/><br/><br/>
        <footer class="footer">
            <strong>UNIVERSIDAD DISTRITAL FRANCISCO JOSÉ DE CALDAS</strong><br/>
            <strong>FACULTAD TECNOLÓGICA</strong><br/>
            <strong>INGENIERÍA EN TELEMÁTICA</strong><br/>
            <strong>MATERIA INGENIERÍA ECONOMICA</strong><br/>
            <strong>BOGOTÁ D.C.</strong><br/>
            <strong>2016 - 3</strong><br/>

        </footer>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        @yield('script')
    </body>
</html>
