@extends('layouts.template')

@section('title')
  Status
@endsection

@section('content')
  <?php
    #echo '<pre>';
    #print_r($data);
    #echo '</pre>';
  ?>

  <div class="col-lg-12">
    <table class="datatables table table-hover" data-paging="true" data-filtering="true" data-sorting="true">
      <thead>
        <tr>
          <th data-class="expand">Id</th>
          <th>Name</th>
          <th data-hide="phone">Descripción</th>
          <th>Status</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <!-- antes de todo debemos saber ante que nos enfrentamos -->
        <?php
          #echo '<pre>';
          # que tipo de variable es
          # print_r($data);
          # cuantas posiciones tiene data
          #print_r(count($data));
          #echo '</pre>';
        ?>
        <!-- validamos si data tiene más de un valor en caso contrario no hay registros -->
        @if( count($data) > 0 )
          @foreach( $data as $item )
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->description }}</td>
              <td><button class="btn btn-xs" style="background-color: {{  $item->color }}">{{ $item->color }}</button></td>
              <td class="text-center">
                <a href="{{ url('status/update/'.$item->id)}}"><i class="fa fa-pencil"></i></a>
                <a class="delete" href="{{ url('status/delete/'.$item->id)}}" data-confirm-title="Eliminar" data-confirm-content="Desea eliminar el código {{ $item->id }}"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>
  </div>
  <script src="{{ asset('js/backend/status/index.js') }}"></script>
@endsection


