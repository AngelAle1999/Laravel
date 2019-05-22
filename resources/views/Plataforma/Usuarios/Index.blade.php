@extends('layouts.app')
@section('title','Integrantes Create')
@section('content')
<div class='container mt-3'>
	<form class="form-group" method="POST" action="/Integrantes" enctype="multipart/form-data">

		<div class="form-group">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label for="">Nombre</label>
			<input type="text" class="form-control" name="name">
		</div>

		<div class="form-group">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label for="">Correo</label>
			<input type="text" class="form-control" name="email">
		</div>
		<div class="form-group">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label for="">Id_rol</label>
			<input type="file" name="Id_rol">
			<br>
		</div>
		<br>
		<button type="submit" class="btn btn-success">Guardar</button>
	</form>
	<div/>
@endsection