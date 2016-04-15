@extends('layouts.template')

@section('title')
  Crear Paginación
@endsection

@section('content')
  <form method="post" action="{{ url('pagination/actions') }}">
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
          <label for="inputEmail" class="col-md-2 control-label">Pagination</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="pagination" id="pagination" placeholder="Pagination">
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
        <a href="{{ url('pagination') }}">
          <button type="button" class="btn btn-success">Cancelar</button>
        </a>
        <button type="submit" class="btn btn-success">Crear</button>
      </div>
    </div>
  </form>
@endsection


