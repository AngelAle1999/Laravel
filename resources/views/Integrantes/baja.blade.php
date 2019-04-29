@extends('layouts.app')
@section('title','Trainers')
@section('content')
<div class='row'>
<div class="col-sm-5">
	<div class="col-sm">
		<div class="card text-center" style="width: 18rem;margin-top:50px">
			<img class="card-img-top rounded-circle mx-auto d-block" src="images/{{$Integrante->img_url}}" alt="" style="height: 100px; width: 100px;background-color: #EFEFEF;margin: 30px">
			<div class="card-body">
				<h5 class="card-title">{{$Integrante->nombre}}</h5>
				
			</div>
		</div>
	</div>
</div>
</div>
@endsection