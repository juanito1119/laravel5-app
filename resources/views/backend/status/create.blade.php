@extends('layouts.template')

@section('title')
  Crear Status
@endsection

@section('content')
  <form method="post" action="{{ url('status/actions') }}">
    <input type="hidden" id="action" name="action" value="create">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
    <div class="col-lg-12">
      <div class="col-lg-12">
        <div class="form-group">
          <label for="inputEmail" class="col-md-2 control-label">Nombre</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="col-md-2 control-label">Description</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="description" id="description" placeholder="Description">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="col-md-2 control-label">Color</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="color" id="color" placeholder="Color">
          </div>
        </div>
      </div>
      <div class="col-lg-12 text-center">
        <a href="{{ url('status') }}">
          <button type="button" class="btn btn-success">Cancelar</button>
        </a>
        <button type="submit" class="btn btn-success">Crear</button>
      </div>
    </div>
  </form>

  <!-- eonasdan-bootstrap-datetimepicker -->
  <link href="{{ asset('bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
  <script src="{{ asset('bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}" type="text/javascript"></script>
  <!-- view -->
  <script src="{{ asset('js/backend/status/create.js')}}"></script>
@endsection


