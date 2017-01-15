@extends('layouts.bg')

@section('content')
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/home') }}">Expert Diagnostic</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{url('register')}}">
                            Registro
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" data-color="" data-image="{{ asset('assets/img/background/background-2.jpg') }}">
            <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">

                            <form method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="card" data-background="color" data-color="blue">
                                    <div class="header">
                                        <h3 class="title">Inicio de sesión</h3>
                                    </div>
                                    <div class="content">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Ingrese su email" class="form-control input-no-border">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group"{{ $errors->has('password') ? ' has-error' : '' }}>
                                            <label for="password">Contraseña</label>
                                            <input type="password" name="password" value="{{ old('password') }}" placeholder="Su contraseña" class="form-control input-no-border" autocomplete="new-password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-fill btn-wd ">Ingresar</button>
                                        <div class="forgot">
                                            <a href="#">Olvidó su contraseña?</a>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer footer-transparent">
                <div class="container">
                    <div class="copyright">
                        &copy; <script>document.write(new Date().getFullYear())</script>, desarrollado por <a href="#">Enigmatic Team</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection