@extends('Plataforma.layout') @section('title') File @stop @section('content')

    <div class="col-md-12">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>

            </div>
        @endif

    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">GUARDAR PLATILLO</h2>
        </header>
        <div class="content-body">
            <div class="row">
                <?php $lectura = "disabled" ?>
                    @if($file->id_file)
                        <?php $lectura = "enabled" ?>
                    @endif
                    {{ Form::open( array('url' => 'Plataforma/file/'.$file->id_file, 'method' => 'POST','class' => 'datosPedido', 'enctype' => 'multipart/form-data') ) }}
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Name *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('name', $file->name) }}
                                {{ Form::text ('name', $file->name, ['class' => 'form-control name']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Description *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('description', $file->description) }}
                                {{ Form::text ('description', $file->description, ['class' => 'form-control Description']) }}
                            </div>
                        </div> 
                        <div class="form-group">
                            {{ Form::label ('url', 'Imagen *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                @if($file->id_file)
                                  {{ Form::file ('url', ['class' => 'custom-file-input', 'id' => 'url']) }}
                                @else
                                  {{ Form::file ('url', ['class' => 'custom-file-input', 'id' => 'url', 'required' =>'required']) }}
                                @endif
                                @if($errors->first('url'))
                                  <div class="alert alert-error alert-dismissible fade in">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                      {{ $errors->first('url') }}
                                  </div>
                                @endif
                            </div>
                            <p>Medidas sugeridas: 1220 * 790</p>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-right" style="top:-60px;">
                                {{ Html::image($file->url, '', array('class' => 'img-thumbnail img-responsive', 'alt' => '140x140', 'id' => 'imagenChange', 'data-holder-rendered' => 'true')) }}
                            </div>
                        </div>                
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Type *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('type', $file->type) }}
                                {{ Form::text ('type', $file->type, ['class' => 'form-control Type']) }}
                            </div>
                        </div>
            
                        @if($file->id_file)
                          {{ Form::hidden ('_method', 'PUT', ['id_file' => 'methodo']) }}
                        @endif

                        <div class="text-right" style="margin-top:120px;">
                             {{ link_to('Plataforma/file', 'Cancelar', ['class' => 'btn btn-warning']) }}
                            {{ Form::submit('Guardar', ['class' => 'btn btn-success', 'type' => 'submit', 'id_file' => 'guardar']) }}
                        </div>
                        {{ csrf_field() }}
                    {{ Form::close() }}
            </div>
        </div>
    </section>
</div>

@stop