@extends('Plataforma.layout') @section('title') Plantilla @stop @section('content')

<div class="col-md-6">


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

                    {{ Form::open( array('url' => 'plan/'.$plan->id_plantilla, 'method' => 'POST','class' => 'datosPedido', 'enctype' => 'multipart/form-data') ) }}

                        <div class="form-group">
                            {{ Form::label ('titulo', 'Nombre *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('name', $plan->name) }}
                                {{ Form::text ('name', $plan->name, ['class' => 'form-control name']) }}
                            </div>
                        </div>

                         <div class="form-group">
                            {{ Form::label ('titulo', 'Type *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('type', $plan->type) }}
                                {{ Form::text ('type', $plan->type, ['class' => 'form-control type']) }}
                            </div>
                        </div>


                         <div class="form-group">
                            {{ Form::label ('titulo', 'Baja *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('baja', $plan->baja) }}
                                {{ Form::text ('baja', $plan->baja, ['class' => 'form-control baja']) }}
                            </div>
                        </div>


                     <div class="form-group">
                            {{ Form::label ('titulo', 'Content *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('content', $plan->content) }}
                                {{ Form::text ('content', $plan->content, ['class' => 'form-control content']) }}
                            </div>
                        </div>


                        @if($plan->id_plantilla)
                          {{ Form::hidden ('_method', 'PUT', ['id_plantilla' => 'methodo']) }}
                        @endif

                        <div class="text-right" style="margin-top:120px;">
                             {{ link_to('plan', 'Cancelar', ['class' => 'btn btn-warning']) }}
                            {{ Form::submit('Guardar', ['class' => 'btn btn-success', 'type' => 'submit', 'id_plantilla' => 'guardar']) }}
                        </div>
                        {{ csrf_field() }}
                    {{ Form::close() }}


            </div>
        </div>
    </section>
</div>

@stop