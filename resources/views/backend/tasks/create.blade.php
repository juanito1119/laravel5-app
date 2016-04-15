@extends('layouts.template')

@section('title')
  Create Tasks
@endsection

@section('content')
  <form method="post" action="{{ url('tasks/actions') }}">
    <input type="hidden" id="action" name="action" value="create">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
    <div class="col-lg-12">
        <div class="form-group">
          <label for="fecha_inicio" class="col-md-2 control-label">Fecha Inicio</label>
          <div class="col-md-10">
            <input type="text" class="datetimepicker form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio">
          </div>
        </div>
        <div class="form-group">
          <label for="fecha_fin" class="col-md-2 control-label">Fecha Final</label>
          <div class="col-md-10">
            <input type="text" class="datetimepicker form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha Final">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail" class="col-md-2 control-label">Responsable</label>
        <div class="col-md-10">
          <select name="responsible_id" id="responsible_id" class="selectpicker" data-live-search="true">
            <option value="">Responsable</option>
            @if(  count($user) > 0 )
              @foreach( $user as $item )
                <option value="{{ $item->id }}">{{ $item->names.' '.$item->surnames }}</option>
              @endforeach
            @endif
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail" class="col-md-2 control-label">Prioridad</label>
        <div class="col-md-10">
          <select name="priority_id" id="priority_id" class="selectpicker" data-live-search="true">
            <option value="">Prioridad</option>
            @if(  count($priority) > 0 )
              @foreach( $priority as $item )
                <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            @endif
          </select>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <label for="inputEmail" class="col-md-2 control-label">Nombre</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="col-md-2 control-label">description</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="description" id="description" placeholder="description">
          </div>
        </div>
      <div class="col-lg-12 text-center">
        <a href="{{ url('tasks') }}">
          <button type="button" class="btn btn-success">Cancelar</button>
        </a>
        <button type="submit" class="btn btn-success">Crear</button>
      </div>
    </div>
  </form>

  <script>
    $(document).on('ready', function(){
      $('.datetimepicker').datetimepicker({
        format: 'DD-MM-YYYY h:mm'
      });

      $('.datetimepicker').keypress(function(event){
        event.preventDefault();
      });
    });
  </script>
@endsection


