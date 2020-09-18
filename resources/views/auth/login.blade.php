<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    {{--  ICON   --}}
    <link rel="shortcut icon" href="img/o.png">
    {{--  FONTAWESOME   --}}
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    {{--  CSS PRINCIPAL   --}}
    <link rel="stylesheet" href="css/app.css">
    {{--  SELECT   --}}
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/select2-bootstrap4.min.css">
    {{--  SELECT   --}}

</head>

<body>

    <body class="hold-transition login-page">
        <!-- /.login-box -->
        <div class="login-box">

            <div class="card">
                <div class="card-body login-card-body">


                    <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}" class="">
                        {{ csrf_field() }}
                        <!--          <img src="{{url("/resources/assets/img/icon_avatar.png")}}" alt="" class="img_login"/>-->


                        <div class="login-logo">

                            <img src="https://www.graphicsprings.com/filestorage/stencils/f794ad52bccba5259868672d8db49de5.png?width=500&height=500"
                                class="img-circle" width="60%" height="30%"><br>

                            <h4><b>PASSE DO ESTUDANTE </b></h4>
                            <hr>
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="icon-addon addon-lg">

                                <input type="email" id="email" class="form-control" placeholder="Email" required=""
                                    autofocus="" name="email" value="{{ old('email') }}">

                                <br>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="icon-addon addon-lg">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="Senha" required="">

                                </div>
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                            {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a senha?') }}
                            </a> --}}

                            <!--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>-->
                    </form>
                    <div class="lockscreen-footer text-center">

                        <strong>Copyright &copy; 2020 - {{  date('Y') }} <br /><a
                                href="https://nautilus.solution.com.br">Nautilus
                                Solutions</a>.</strong> <br />All rights reserved.
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery 3 -->
        <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="../../plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
        </script>


    </body>


</html>
