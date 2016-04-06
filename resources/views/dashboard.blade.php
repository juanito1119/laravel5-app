@extends('layouts.template')

@section('title')
  Dashboard
@endsection

@section('content')
  <h1>Bienvenido {{ Auth::user()->names.' '.Auth::user()->surnames }}</h1>
@endsection


