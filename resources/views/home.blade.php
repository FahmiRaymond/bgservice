@extends('layouts.app')

@section('title')
  Dashboard
@endsection

@section('breadcrumb')
   @parent
   <li>Dashboard</li>
@endsection

@section('content') 
<div class="row">

  <div class="col-xs-12">
    <div class="panel panel-default">
      <div class="col-md-10">
        <h3>Bintang Gajah Service Phone Martapura</h3>
        <h4>Selamat datang di portal pelayanan dan pengelolaan data Service Handphone</h4>
      </div>
      <img src="{{ asset('img/bgcom.jpg') }}" alt="First slide" class="img-responsive" style="width:100%">
    </div>
</div>
@endsection