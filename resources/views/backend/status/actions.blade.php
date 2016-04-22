@extends('layouts.template')

@section('title')
@endsection

@section('content')
  <style>
    .container-app{
      background-color: transparent;
    }
  </style>

  <div class="notification">
    @if( isset($data) )
      <div class="success">
        <div class="header">
          <span>Hola {{ Auth::user()->names }}</span>
        </div>
        <div class="caption">
          <i class="fa fa-check-circle" aria-hidden="true"></i>
        </div>
        <div class="body">
          @if( $action == 'create' )
            <h2>Se ha Creado el registro <small>{{ $data->name }}</small></h2>
            <a href="{{ url('status/create') }}" class="btn btn-raised active">.Crear Otro</a>
            <a href="{{ url('status')}}" class="btn btn-raised active">Ver todos</a>
          @elseif( $action == 'update' )
            <h2>Se ha Actualizado el siguiente registro <small>{{ $data->name }}</small></h2>
            <a href="{{ url('status')}}" class="btn btn-raised active">Ver todos</a>
          @else
            <h2>Se ha Eliminado el siguiente registro <small>{{ $data->name }}</small></h2>
            <a href="{{ url('status')}}" class="btn btn-raised active">Ver todos</a>
          @endif
        </div>
      </div>
    @else
      <div class="danger">
        <div class="header">
          <span>Hola {{ Auth::user()->names }}</span>
        </div>
        <div class="caption">
          <i class="fa fa-warning" aria-hidden="true"></i>
        </div>
        <div class="body">
          <h2>Error <small>{{ $error }}</small></h2>
        </div>
      </div>
    @endif
  </div>

@endsection


