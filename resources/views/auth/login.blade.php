<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- jQuery  -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap -->
    <link href="{{ asset('bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bower_components/bootstrap-material-design/dist/js/material.min.js') }}"></script>
    <!-- jquery validation -->
    <script src="{{ asset('bower_components/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-validation/src/localization/messages_es.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <!-- app style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login">
    <div class="container-login">
      <form class="form-signin">
        <h2 class="form-signin-heading">Login My App</h2>
        <div class="form-group form-group label-floating is-empty">
          <label for="emial" class="control-label">{{ trans('global.email') }}</label>
          <input type="email" class="form-control" id="email" name="email">
          <span class="help-block">{{ trans('global.login.legend_emial') }}</span>
          <span class="material-input"></span>
        </div>
        <div class="form-group form-group label-floating is-empty">
          <label for="password" class="control-label">{{ trans('global.password') }}</label>
          <input type="password" class="form-control" id="password" name="password">
          <span class="help-block">{{ trans('global.login.legend_password') }}</span>
          <span class="material-input"></span>
        </div>
        <button class="btn btn-lg btn-raised btn-success  btn-block" type="submit">Sign in</button>
        <div class="preloader hide">
          <img src="{{ asset('img/progress.gif') }}">
        </div>
        <div class="show-error">
          <p class="text-center text-danger hide">El usuario o contraseña son incorrectos</p>
          <p class="text-center text-warning hide">El usuario se encuentra de baja</p>
        </div>
      </form>
    </div>
  </body>


</html>
