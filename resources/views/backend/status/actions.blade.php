@extends('layouts.template')

@section('title')
  {{ $action }}
@endsection

@section('content')

  @if( isset($data) )
    @if( $action == 'create' )
      <h1>Se ha creado el siguiente registro <small>{{ $data->name }}</small></h1>
    @elseif( $action == 'update' )
      <h1>Se ha Actualizado el siguiente registro <small>{{ $data->name }}</small></h1>
    @else
      <h1>Se ha Eliminado el siguiente registro <small>{{ $data->name }}</small></h1>
    @endif
  @else
    <?php
      #echo '<pre>';
      #print_r($error);
      #echo '</pre>';
    ?>
    <h1>{{ $error }}</h1>
  @endif

@endsection


