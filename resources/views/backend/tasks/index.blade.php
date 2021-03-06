@extends('layouts.template')

@section('title')
  Tasks
@endsection

@section('content')
  <?php
    #echo '<pre>';
    #print_r($data);
    #echo '</pre>';
  ?>

  <div class="col-lg-12 text-right">
    <a href="{{ url('tasks/create') }}" class="btn btn-action">Crear </a>
  </div>

  <div class="col-lg-12">
    <table class="datatables table table-hover" data-paging="true" data-filtering="true" data-sorting="true">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Responsable</th>
          <th>Prioridad</th>
          <th>Description</th>
          <th>Fecha Inicio</th>
          <th>Fecha Final</th>
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
              <td>{{ $item->responsable }}</td>
              <td>{{ $item->prioridad }}</td>
              <?php
                $date = strtotime($item->fecha_inicio);
              ?>
              <td>{{ $item->description }}</td>
              <td>{{ date('d-m-y',$date) }}</td>
              <td>{{ $item->fecha_fin }}</td>
              <td class="text-center">
                <a href="{{ url('tasks/update/'.$item->id)}}"><i class="fa fa-pencil"></i></a>
                <a href="{{ url('tasks/delete/'.$item->id)}}" data-confirm-title="Eliminar" data-confirm-content="Desea eliminar el código {{ $item->id }}"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          @endforeach
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


