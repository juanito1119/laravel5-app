<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- jQuery  -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- font-awesome -->
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bower_components/bootstrap-material-design/dist/js/material.min.js') }}"></script>
    <!-- jquery validation -->
    <script src="{{ asset('bower_components/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-validation/src/localization/messages_es.js') }}"></script>
    <!-- datatables -->
    <link href="{{ asset('bower_components/datatables/media/css/dataTables.material.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <!-- datatables-responsive -->
    <link href="{{ asset('bower_components/datatables-responsive/files/1.10/css/datatables.responsive.css') }}" rel="stylesheet">
    <script src="{{ asset('bower_components/datatables-responsive/files/1.10/js/datatables.responsive.js')}}" type="text/javascript"></script>
    <!-- datatables-responsive -->
    <script src="{{ asset('bower_components/datatables-tabletools/js/dataTables.tableTools.js')}}" type="text/javascript"></script>


    <!-- popconfirm -->
    <script src="{{ asset('bower_components/popconfirm/jquery.popconfirm.js') }}" type="text/javascript"></script>
    <!-- moment -->
    <script src="{{ asset('bower_components/moment/min/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bower_components/moment/locale/es.js') }}" type="text/javascript"></script>

    <!-- eonasdan-bootstrap-datetimepicker -->
    <link href="{{ asset('bower_components/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bower_components/bootstrap-select/dist/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <!--  -->
    <link href="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>



    <!-- app style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('dashboard') }}">My App</a>
        </div>
        <div class="navbar-collapse collapse navbar-warning-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('users') }}">Usuarios</a></li>
            <li><a href="{{ url('status') }}">Status</a></li>
            <li><a href="{{ url('tasks') }}">Tareas</a></li>
            <li><a href="{{ url('pagination') }}">Paginación</a></li>
            <li><a href="{{ url('priority') }}">Prioridad</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('logout') }}"> <i class="glyphicon glyphicon-off"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <h2 class="class-title">
        @yield('title')
      </h2>
      <div class="container-app">
        @yield('content')
      </div>
    </div>
    <script>
      // inicializamos material que lo puedes encontrar en el siguiente link http://fezvrasta.github.io/bootstrap-material-design/#getting-started
      $.material.init();
    </script>
  </body>
</html>
