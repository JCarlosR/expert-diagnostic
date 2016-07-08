<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Expert Diagnostic</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('assets/css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">

    @yield('styles')

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Expert Diagnostic
                </a>
            </div>

            <ul class="nav">
                <li @yield('home')>
                    <a href="{{ url('/home') }}">
                        <i class="ti-panel"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pacientes') }}">
                        <i class="ti-user"></i>
                        <p>Pacientes</p>
                    </a>
                </li>
                <li @yield('symptom')>
                    <a href="{{ url('/symptom') }}">
                        <i class="ti-view-list-alt"></i>
                        <p>Síntomas</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/enfermedades') }}">
                        <i class="ti-headphone-alt"></i>
                        <p>Enfermedades</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/medicamentos') }}">
                        <i class="ti-blackboard"></i>
                        <p>Medicamentos</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/conocimiento') }}">
                        <i class="ti-pencil-alt2"></i>
                        <p>Base de conocimiento</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/diagnostico') }}">
                        <i class="ti-map"></i>
                        <p>Diagnóstico</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">@yield('title')</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
                                <p>Diagnóstico</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <p class="notification">4</p>
                                <p>Notificaciones</p>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Notificación 1</a></li>
                                <li><a href="#">Notificación 2</a></li>
                                <li><a href="#">Notificación 3</a></li>
                                <li><a href="#">Notificación 4</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-settings"></i>
                                <p>Configuración</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/logout') }}">Cerrar sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Enigmatic Team
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/user/SorcJC" target="_blank">
                                Youtube
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Acerca de
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, desarrollado con <i class="fa fa-heart heart"></i> por <a href="#">Enigmatic Team</a>
                </div>
            </div>
        </footer>
    </div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ asset('assets/js/bootstrap-checkbox-radio.js') }}"></script>

<!--  Charts Plugin -->
<script src="{{ asset('assets/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="{{ asset('assets/js/paper-dashboard.js') }}"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/demo.js') }}"></script>

@section('scripts')
    <script>
    $(document).ready(function () {
        demo.initChartist();

        $.notify({
            icon: 'ti-gift',
            message: "Bienvenido a <b>Expert Diagnostic</b> - su sistema experto de diagnóstico médico !"

        }, {
            type: 'success',
            timer: 4000
        });
    });
    </script>
@show

<script>
    $(document).ready(function () {
        // Set the active class
        $('ul.nav>li>a').each(function (i, e) {
            if ( $(e).attr('href') == removeParamsUrl(window.location.href) )
                $(e).parent().addClass('active');
        });
    });
    function removeParamsUrl(url)
    {
        // there are params?
        if (url.indexOf('?') == -1)
            return url;

        // get the part before ?
        return url.split("?")[0];
    }
</script>


</body>
</html>
