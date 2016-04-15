@extends('layouts.template')

@section('title')
  Crear Usuario
@endsection

@section('content')
  <form>
    <div class="col-lg-12">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="inputEmail" class="col-md-2 control-label">Nombre</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="names" id="names" placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="col-md-2 control-label">Apellido</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="surnames" id="surnames" placeholder="Apellido">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="col-md-2 control-label">Correo</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="email" id="email" placeholder="Correo">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="col-md-2 control-label">Correo</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="email" id="email" placeholder="Correo">
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection


