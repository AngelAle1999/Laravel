@extends('Plataforma.layout') @section('title') TypePlatillos @stop @section('content')

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
                <h2 class="title pull-left">GUARDAR PLATILLOS</h2>

        </header>
        <div class="content-body">

            <div class="row">
                <?php $lectura = "disabled" ?>
                    @if($tpla->id_type_platillos)
                      <?php $lectura = "enabled" ?>
                    @endif

                    {{ Form::open( array('url' => 'Plataforma/tpla/'.$tpla->id_type_platillos, 'method' => 'POST','class' => 'datosPedido', 'enctype' => 'multipart/form-data') ) }}

                        <div class="form-group">
                            {{ Form::label ('titulo', 'Nombre *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('name', $tpla->name) }}
                                {{ Form::text ('name', $tpla->name, ['class' => 'form-control name']) }}
                            </div>
                        </div>


                         <div class="form-group">
                            {{ Form::label ('img_src', 'Imagen *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                @if($tpla->id_type_platillos)
                                  {{ Form::file ('img_src', ['class' => 'custom-file-input', 'id' => 'img_src']) }}
                                @else
                                  {{ Form::file ('img_src', ['class' => 'custom-file-input', 'id' => 'img_src', 'required' =>'required']) }}
                                @endif
                                @if($errors->first('img_src'))
                                  <div class="alert alert-error alert-dismissible fade in">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                      {{ $errors->first('img_src') }}
                                  </div>
                                @endif
                            </div>
                            <p>Medidas sugeridas: 1220 * 790</p>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-right" style="top:-60px;">
                                {{ Html::image($tpla->img_src, '', array('class' => 'img-thumbnail img-responsive', 'alt' => '140x140', 'id' => 'imagenChange', 'data-holder-rendered' => 'true')) }}
                                <!-- <a class="preview previewGasto" href="/{{ $tpla->img_src }}" rel="prettyPhoto"><i class="fa fa-eye"></i></a> -->
                            </div>
                        </div>


                         <div class="form-group">
                            {{ Form::label ('titulo', 'Descripcion *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('description', $tpla->description) }}
                                {{ Form::text ('description', $tpla->description, ['class' => 'form-control description']) }}
                            </div>
                        </div>



                         @if($tpla->id_type_platillos)
                          {{ Form::hidden ('_method', 'PUT', ['id_type_platillos' => 'methodo']) }}
                        @endif


                        <div class="text-right" style="margin-top:120px;">
                             {{ link_to('Plataforma/tpla', 'Cancelar', ['class' => 'btn btn-warning']) }}
                            {{ Form::submit('Guardar', ['class' => 'btn btn-success', 'type' => 'submit', 'id_type_platillos' => 'guardar']) }}
                        </div>
                        {{ csrf_field() }}
                    {{ Form::close() }}


            </div>
        </div>
    </section>
</div>

@stop