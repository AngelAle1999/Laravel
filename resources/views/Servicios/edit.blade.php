@extends('layouts.app')
@section('title','Servicios Edit')
@section('content')
<div class='container mt-3'>
	<form class="form-group" method="POST" action="/Servicios/{{ $Servicio->nombre }}" enctype="multipart/form-data">

		{{method_field('PUT')}}
		{{ csrf_field()}}

		<div class="form-group">
			<input type="hidden" name="token" value="{{ csrf_token() }}">
			<label for="">Nombre</label>
			<input type="text" class="form-control" name="nombre" value="{{$Servicio->nombre}}">
		</div>

		<div class="form-group">
			<input type="hidden" name="token" value="{{ csrf_token() }}">
			<label for="">Posicion</label>
			<input type="text" class="form-control" name="posicion"  value="{{$Servicio->posicion}}">
		</div>
		<div class="form-group">
			<input type="hidden" name="token" value="{{ csrf_token() }}">
			<label for="">Avatar</label>
			<input type="file" name="img_url">
			<br>
		</div>
		<br>
		<div class="text-center">
		<button type="submit" class="btn btn-success bg-info">Actualizar</button>
	</div>
	</form>
@endsection