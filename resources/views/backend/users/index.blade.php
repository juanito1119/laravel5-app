@extends('layouts.template')

@section('title')
  Usuarios
@endsection

@section('content')
  <?php
    #echo '<pre>';
    #print_r($data);
    #echo '</pre>';
  ?>

  <div class="col-lg-12 text-right">
    <a href="{{ url('users/create') }}" class="btn btn-action">Crear </a>
  </div>

  <div class="col-lg-12">
    <table class="datatables table table-hover" data-paging="true" data-filtering="true" data-sorting="true">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Mail</th>
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
              <td>{{ $item->names .' '.$item->surnames }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->status_id }}</td>
              <td class="text-center">
                <a href="{{ url('tarea/edit/'.$item->id)}}"><i class="fa fa-pencil"></i></a>
                <a href="{{ url('tarea/delete/'.$item->id)}}" data-confirm-title="Eliminar" data-confirm-content="Desea eliminar el código {{ $item->id }}"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <h4 class="text-center text-danger">{{ trans('global.not_found') }}</h4>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
  <script type="text/javascript">
      $(document).on('ready', function(){
          $('table.datatables').DataTable({
              columnDefs: [
                  {
                      searchable: true,
                      orderable: true,
                      targets: 'all'
                  }
              ],
              order: [[ 0, "ASC" ]]
          });

          $("table.datatables tbody a").popConfirm({
              yesBtn: "Si",
              noBtn: "No",
              placement: 'left'
          });
      });
  </script>
@endsection


