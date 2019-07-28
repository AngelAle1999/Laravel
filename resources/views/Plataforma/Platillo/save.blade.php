@extends('Plataforma.layout') @section('title') Platillo @stop @section('content')

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
                    @if($platillo->Id_platillo)
                        <?php $lectura = "enabled" ?>
                    @endif
                    {{ Form::open( array('url' => 'Plataforma/platillo/'.$platillo->Id_platillo, 'method' => 'POST','class' => 'datosPedido', 'enctype' => 'multipart/form-data') ) }}
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Nombre *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('name', $platillo->name) }}
                                {{ Form::text ('name', $platillo->name, ['class' => 'form-control name']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('img_url', 'Imagen *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                @if($platillo->Id_platillo)
                                  {{ Form::file ('img_url', ['class' => 'custom-file-input', 'id' => 'img_url']) }}
                                @else
                                  {{ Form::file ('img_url', ['class' => 'custom-file-input', 'id' => 'img_url', 'required' =>'required']) }}
                                @endif
                                @if($errors->first('Imagen'))
                                  <div class="alert alert-error alert-dismissible fade in">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                      {{ $errors->first('img_url') }}
                                  </div>
                                @endif
                            </div>
                            <p>Medidas sugeridas: 1220 * 790</p>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-right" style="top:-60px;">
                                {{ Html::image($platillo->img_url, '', array('class' => 'img-thumbnail img-responsive', 'alt' => '140x140', 'id' => 'imagenChange', 'data-holder-rendered' => 'true')) }}
                                <!-- <a class="preview previewGasto" href="/{{ $platillo->img_src }}" rel="prettyPhoto"><i class="fa fa-eye"></i></a> -->
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Estatus *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('status', $platillo->status) }}
                                {{ Form::text ('status', $platillo->status, ['class' => 'form-control Estatus']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Descripción *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('descripcion', $platillo->descripcion) }}
                                {{ Form::text ('descripcion', $platillo->descripcion, ['class' => 'form-control Descripción']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Precio *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('price', $platillo->price) }}
                                {{ Form::text ('price', $platillo->price, ['class' => 'form-control Price']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Cantidad *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('amount', $platillo->amount) }}
                                {{ Form::text ('amount', $platillo->amount, ['class' => 'form-control Amount']) }}
                            </div>
                        </div>                         
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Precio infantil *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('infant_price', $platillo->infant_price) }}
                                {{ Form::text ('infant_price', $platillo->infant_price, ['class' => 'form-control Infant_price']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Tipo_id *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('type_id', $platillo->type_id) }}
                                {{ Form::text ('type_id', $platillo->type_id, ['class' => 'form-control Type_id']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Condición_número_de_personas_1 *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('condition_number_people_1', $platillo->condition_number_people_1) }}
                                {{ Form::text ('condition_number_people_1', $platillo->condition_number_people_1, ['class' => 'form-control Condition_number_people_1']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Precio_numero_de_personas_1 *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('price_number_people_1', $platillo->price_number_people_1) }}
                                {{ Form::text ('price_number_people_1', $platillo->price_number_people_1, ['class' => 'form-control Price_number_people_1']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Condición_número_de_personas_2 *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('condition_number_people_2', $platillo->condition_number_people_2) }}
                                {{ Form::text ('condition_number_people_2', $platillo->condition_number_people_2, ['class' => 'form-control Condition_number_people_2']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Precio_numero_de_personas_2 *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('price_number_people_2', $platillo->price_number_people_2) }}
                                {{ Form::text ('price_number_people_2', $platillo->price_number_people_2, ['class' => 'form-control Price_number_people_2']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Condicion_cantidad_1 *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('condition_amount_1', $platillo->condition_amount_1) }}
                                {{ Form::text ('condition_amount_1', $platillo->condition_amount_1, ['class' => 'form-control Condition_amount_1']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Precio_cantidad_1 *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('price_amount_1', $platillo->price_amount_1) }}
                                {{ Form::text ('price_amount_1', $platillo->price_amount_1, ['class' => 'form-control price_amount_1']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Condicion_cantidad_2 *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('condition_amount_2', $platillo->condition_amount_2) }}
                                {{ Form::text ('condition_amount_2', $platillo->condition_amount_2, ['class' => 'form-control Condition_amount_2']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label ('titulo', 'Precio_cantidad_2 *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('price_amount_2', $platillo->price_amount_2) }}
                                {{ Form::text ('price_amount_2', $platillo->price_amount_2, ['class' => 'form-control price_amount_2']) }}
                            </div>
                        </div>
                       
                        </div>
                        @if($platillo->Id_platillo)
                          {{ Form::hidden ('_method', 'PUT', ['Id_platillo' => 'methodo']) }}
                        @endif

                        <div class="text-right" style="margin-top:120px;">
                             {{ link_to('Plataforma/platillo', 'Cancelar', ['class' => 'btn btn-warning']) }}
                            {{ Form::submit('Guardar', ['class' => 'btn btn-success', 'type' => 'submit', 'Id_platillo' => 'guardar']) }}
                        </div>
                        {{ csrf_field() }}
                    {{ Form::close() }}
            </div>
        </div>
    </section>
</div>

@stop