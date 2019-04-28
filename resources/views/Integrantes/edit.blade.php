@extends('layouts.app')
@section('title','Integrantes Edit')
@section('content')
<div class='container mt-3'>
	<form class="form-group" method="POST" action="/Integrantes/{{ $integrantes->nombre }}" enctype="multipart/form-data">

		{{method_field('PUT')}}
		{{ csrf_field()}}
		
		<div class="form-group">
			<input type="hidden" name="token" value="{{ csrf_token() }}">
			<label for="">Nombre</label>
			<input type="text" class="form-control" name="name" value="{{$integrantes->nombre}}">
		</div>

		<div class="form-group">
			<input type="hidden" name="token" value="{{ csrf_token() }}">
			<label for="">Correo</label>
			<input type="text" class="form-control" name="email"  value="{{$integrantes->email}}">
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