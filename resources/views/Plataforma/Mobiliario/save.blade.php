@extends('Plataforma.layout') @section('title') Mobiliario @stop @section('content')

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
                <h2 class="title pull-left">GUARDAR MOBILIARIO</h2>

        </header>
        <div class="content-body">

            <div class="row">
                <?php $lectura = "disabled" ?>
                    @if($mob->id_mobiliario)
                      <?php $lectura = "enabled" ?>
                    @endif

                    {{ Form::open( array('url' => 'mob/'.$mob->id_mobiliario, 'method' => 'POST','class' => 'datosPedido', 'enctype' => 'multipart/form-data') ) }}

                        <div class="form-group">
                            {{ Form::label ('titulo', 'Nombre *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('name', $mob->name) }}
                                {{ Form::text ('name', $mob->name, ['class' => 'form-control name']) }}
                            </div>
                        </div>

                         <div class="form-group">
                            {{ Form::label ('titulo', 'Presentation *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('presentation', $mob->presentation) }}
                                {{ Form::text ('presentation', $mob->presentation, ['class' => 'form-control Presentation']) }}
                            </div>
                        </div>


                         <div class="form-group">
                            {{ Form::label ('titulo', 'Description *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('description', $mob->description) }}
                                {{ Form::text ('description', $mob->description, ['class' => 'form-control Description']) }}
                            </div>
                        </div>


                         <div class="form-group">
                            {{ Form::label ('titulo', 'Stock *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('stock', $mob->stock) }}
                                {{ Form::text ('stock', $mob->stock, ['class' => 'form-control Stock']) }}
                            </div>
                        </div>


                         <div class="form-group">
                            {{ Form::label ('img_src', 'Imagen *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                @if($mob->id_mobiliario)
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
                                {{ Html::image($mob->img_src, '', array('class' => 'img-thumbnail img-responsive', 'alt' => '140x140', 'id' => 'imagenChange', 'data-holder-rendered' => 'true')) }}
                                <!-- <a class="preview previewGasto" href="/{{ $mob->img_src }}" rel="prettyPhoto"><i class="fa fa-eye"></i></a> -->
                            </div>
                        </div>


                          <div class="form-group">
                            {{ Form::label ('titulo', 'Price *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('price', $mob->price) }}
                                {{ Form::text ('price', $mob->price, ['class' => 'form-control Price']) }}
                            </div>
                        </div>

                         
                           <div class="form-group">
                            {{ Form::label ('titulo', 'Baja *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('baja', $mob->baja) }}
                                {{ Form::text ('baja', $mob->baja, ['class' => 'form-control baja']) }}
                            </div>
                        </div>
                        
                         @if($mob->id_mobiliario)
                          {{ Form::hidden ('_method', 'PUT', ['id_mobiliario' => 'methodo']) }}
                        @endif


                        <div class="text-right" style="margin-top:120px;">
                             {{ link_to('mob', 'Cancelar', ['class' => 'btn btn-warning']) }}
                            {{ Form::submit('Guardar', ['class' => 'btn btn-success', 'type' => 'submit', 'id_mobiliario' => 'guardar']) }}
                        </div>
                        {{ csrf_field() }}
                    {{ Form::close() }}


            </div>
        </div>
    </section>
</div>

@stop