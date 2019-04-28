@extends('layouts.app')
@section('title','Servicios Create')
@section('content')
<div class='container mt-3'>
	<form class="form-group" method="POST" action="/Servicios" enctype="multipart/form-data">

		<div class="form-group">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label for="">Nombre del servicio</label>
			<input type="text" class="form-control" name="name">
		</div>

		<div class="form-group">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label for="">Posicion</label>
			<input type="text" class="form-control" name="Posicion">
		</div>
		<div class="form-group">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label for="">Avatar</label>
			<input type="file" name="avatar">
			<br>
		</div>
		<br>
		<button type="submit" class="btn btn-success">Guardar</button>
	</form>
	</div>
@endsection