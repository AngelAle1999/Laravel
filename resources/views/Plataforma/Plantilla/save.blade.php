@extends('Plataforma.layout') @section('title') Plantilla @stop @section('content')

<div class="col-md-12">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="box ">
        <header class="panel_header">
                <h2 class="title pull-left">GUARDAR PLANTILLA</h2>
        </header>
        <div class="content-body">
            <div class="row">
                <?php $lectura = "disabled" ?>
                @if($plan->id_plantilla)
                    <?php $lectura = "enabled" ?>
                @endif

                {{ Form::open( array('url' => 'Plataforma/plan/'.$plan->id_plantilla, 'method' => 'POST','class' => 'datosPedido', 'enctype' => 'multipart/form-data') ) }}
                    <div class="form-group">
                        {{ Form::label ('titulo', 'Nombre *', ['class' => 'form-label']) }}
                        <div class="controls">
                            <i class=""></i>
                            {{ Form::hidden('name', $plan->name) }}
                            {{ Form::text ('name', $plan->name, ['class' => 'form-control  name']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label ('titulo', 'Tipo *', ['class' => 'form-label']) }}
                        <div class="controls">
                            <i class=""></i>
                            <select class="form-control" name="type">
                                <option value="Fiesta">Fiesta</option>
                                <option value="Cumpleaños">Cumpleaños</option>
                                <option value="Bautizo">Bautizo</option>
                                <option value="Navidad">Navidad</option>
                                <option value="Año nuevo">Año nuevo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label ('titulo', 'Contenido *', ['class' => 'form-label']) }}
                        <div class="controls">
                            <i class=""></i>
                            {{ Form::hidden('content', $plan->content) }}
                            {{ Form::textarea ('content', $plan->content, ['class' => 'bootstrap-wysihtml5-textarea content','placeholder'=>'Escribe aquí...','style'=>'width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;']) }}
                        </div>
                    </div>

                    @if($plan->id_plantilla)
                        {{ Form::hidden ('_method', 'PUT', ['id_plantilla' => 'methodo']) }}
                    @endif

                    <div class="text-right" style="margin-top:120px;">
                        {{ link_to('Plataforma/plan', 'Cancelar', ['class' => 'btn btn-warning']) }}
                        {{ Form::submit('Guardar', ['class' => 'btn btn-success', 'type' => 'submit', 'id_plantilla' => 'guardar']) }}
                    </div>
                {{ csrf_field() }}
                {{ Form::close() }}
            </div>
        </div>
    </section>
</div>

@stop