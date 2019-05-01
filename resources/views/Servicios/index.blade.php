@extends('layouts.app')
@section('title','Trainers')
@section('content')
<div class='row'>
@foreach($Servicios as $trainer)
<div class="col-sm-5">
	<div class="col-sm">
		<div class="card text-center" style="width: 18rem;margin-top:50px">
			<img class="card-img-top rounded-circle mx-auto d-block" src="images/{{$trainer->img_url}}" alt="" style="height: 100px; width: 100px;background-color: #EFEFEF;margin: 30px">
			<div class="card-body">
				<h5 class="card-title">{{$trainer->nombre}}</h5>
				<a href="/Servicios/{{$trainer->nombre}}/edit" class="btn btn-success bg-info">Editar</a>
			<form method="POST" action="/Servicios/{{$trainer->nombre}}/">

		{{method_field('DELETE')}}
		{{ csrf_field()}}
		

				<button type="submit" class="btn btn-success bg-info">Eliminar</button>
			</form>
			</div>
		</div>
	</div>
</div>
@endforeach
</div>
@endsection