@extends('plataforma.layout') @section('title') Banners @stop @section('content')

<div class="col-md-6">

    <section class="box ">
        <header class="panel_header">
                <h2 class="title pull-left">GUARDAR BANNER</h2>

        </header>
        <div class="content-body">

            <div class="row">
                <?php $lectura = "disabled" ?>
                    @if($banner->pedido_id)
                      <?php $lectura = "enabled" ?>
                    @endif

                    {{ Form::open( array('url' => 'plataforma/banner/'.$banner->id_banner, 'method' => 'POST', 'id' => 'icon_validate', 'class' => 'datosPedido', 'enctype' => 'multipart/form-data') ) }}

                        <div class="form-group">
                            {{ Form::label ('titulo', 'Título *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('titulo', $banner->titulo) }}
                                {{ Form::text ('titulo', $banner->titulo, ['class' => 'form-control titulo','required' => 'required']) }}
                                @if($errors->first('titulo'))
                                  <div class="alert alert-error alert-dismissible fade in">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                      </button>
                                      {{ $errors->first('titulo') }}
                                  </div>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            {{ Form::label ('descripcion', 'Descripción *', ['class' => 'form-label']) }}
                            {{ Form::hidden('descripcion', $banner->descripcion) }}
                            {{ Form::textarea('descripcion', $banner->descripcion, ['placeholder' => 'Descripción ...','size' => '30x5','style' => 'width: 100%; height: 130px; font-size: 14px; line-height: 23px;padding:15px;' ,'class' => '', 'required' => 'required']) }}
                        </div> --}}

                        {{-- <div class="form-group">
                            {{ Form::label ('redirigir', 'Redirigir', ['class' => 'form-label']) }}
                            <div class="controls">
                                {{ Form::hidden('redirigir', null) }}
                                @if($banner->id_banner)
                                  {{ Form::select('redirigir', ['Brandy' => 'Brandy', 'Cerveza' => 'Cerveza', 'Champagne' => 'Champagne', 'Cognac' => 'Cognac', 'Destilado' => 'Destilado', 'Ginebra' => 'Ginebra', 'Licor' => 'Licor', 'Mezcal' => 'Mezcal', 'Ron' => 'Ron', 'Tequila' => 'Tequila', 'Vino' => 'Vino', 'Vodka' => 'Vodka', 'Whisky' => 'Whisky', 'Botanas' => 'Botanas', 'Desechables' => 'Desechables', 'Otros' => 'Otros', 'Refrescos' => 'Refrescos', 'Promociones' => 'Promociones' , 'Paquetes' => 'Paquetes', 'Ninguno' => 'Ninguno'] , $banner->redirigir,  ['id' => 's2example-1']) }}
                                @else
                                  {{ Form::select('redirigir', ['Brandy' => 'Brandy', 'Cerveza' => 'Cerveza', 'Champagne' => 'Champagne', 'Cognac' => 'Cognac', 'Destilado' => 'Destilado', 'Ginebra' => 'Ginebra', 'Licor' => 'Licor', 'Mezcal' => 'Mezcal', 'Ron' => 'Ron', 'Tequila' => 'Tequila', 'Vino' => 'Vino', 'Vodka' => 'Vodka', 'Whisky' => 'Whisky', 'Botanas' => 'Botanas', 'Desechables' => 'Desechables', 'Otros' => 'Otros', 'Refrescos' => 'Refrescos', 'Promociones' => 'Promociones'] , 'Brandy',  ['id' => 's2example-1']) }}
                                @endif
                                @if($errors->first('redirigir'))
                                  <div class="alert alert-error alert-dismissible fade in">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                      {{ $errors->first('redirigir') }}
                                  </div>
                                @endif
                            </div>
                        </div> --}}

                        <div class="form-group">
                            {{ Form::label ('pos', 'Posición', ['class' => 'form-label']) }}
                            <div class="controls">
                                {{ Form::hidden('pos', null) }}
                                @if($banner->id_banner)
                                  {{ Form::select('pos', $posiciones , $banner->pos,  ['id' => 's2example-2']) }}
                                @else
                                  {{ Form::select('pos', $posiciones , 'Posicion',  ['id' => 's2example-2']) }}
                                @endif
                                @if($errors->first('pos'))
                                  <div class="alert alert-error alert-dismissible fade in">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                      {{ $errors->first('pos') }}
                                  </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label ('imagen', 'Imagen *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                @if($banner->id_banner)
                                  {{ Form::file ('imagen', ['class' => 'custom-file-input', 'id' => 'imagen']) }}
                                @else
                                  {{ Form::file ('imagen', ['class' => 'custom-file-input', 'id' => 'imagen', 'required' =>'required']) }}
                                @endif
                                @if($errors->first('imagen'))
                                  <div class="alert alert-error alert-dismissible fade in">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                      {{ $errors->first('imagen') }}
                                  </div>
                                @endif
                            </div>
                            <p>Medidas sugeridas: 1220 * 790</p>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-right" style="top:-60px;">
                                {{ Html::image($banner->imagen, '', array('class' => 'img-thumbnail img-responsive', 'alt' => '140x140', 'id' => 'imagenChange', 'data-holder-rendered' => 'true')) }}
                                <!-- <a class="preview previewGasto" href="/{{ $banner->imagen }}" rel="prettyPhoto"><i class="fa fa-eye"></i></a> -->
                            </div>
                        </div>



                        @if($banner->id_banner)
                          {{ Form::hidden ('_method', 'PUT', ['id' => 'methodo']) }}
                        @endif

                        <div class="text-right" style="margin-top:120px;">
                            {{ link_to('plataforma/banner', 'Cancelar', ['class' => 'btn btn-warning']) }}
                            {{ Form::submit('Guardar', ['class' => 'btn btn-success', 'type' => 'submit', 'id' => 'guardar']) }}
                        </div>
                        {{ csrf_field() }}
                    {{ Form::close() }}

            </div>
        </div>
    </section>
</div>

@stop

@section('moreJs')
<script type="text/javascript">
  $(function(){

    $("#imagen").change(function () {
      if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#imagenChange').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
      }
    });


  });
</script>
@stop
