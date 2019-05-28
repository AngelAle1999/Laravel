@extends('plataforma.layout')


@section('title') Banners @stop

@section('content')

    <div class="col-md-12">
        <section class="box ">
          <header class="panel_header">
              <h2 class="title pull-left">Banners</h2>
              <div class="actions panel_actions pull-right">
                  {{ Html::link('plataforma/banner/create', 'Crear Nuevo', array('class' => 'btn btn-info')) }}
              </div>
          </header>
          <div class="content-body">

            @if(Session::has('notice'))
              <div class="alert alert-error alert-dismissible fade in">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <strong>{{ Session::get('notice') }}</strong>
              </div>
            @endif

            @if(Session::has('success'))
              <div class="alert alert-success alert-dismissible fade in">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <strong>{{ Session::get('success') }}</strong>
              </div>
            @endif



                <div class="row">
                    @if ($banners->count())
                        <table class="table table table-striped dt-responsive display" id="example-1">
                            <thead>
                            <tr>
                                <th class="text-left">Titulo</th>
                                <!-- <th class="text-left">Descripción</th> -->
                                <!-- <th class="text-left">Redirigir</th> -->
                                <th class="text-left">Posición</th>
                                <th class="text-left">Imagen</th>
                                <th class="text-left">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <td width="30%" class="text-uppercase">{{ $banner->titulo }}</td>
                                    {{-- <!-- <td width="45%" class="text-left">{{ $banner->descripcion}}</td> --> --}}
                                    <!-- <td width="20%" class="text-left">{{ $banner->redirigir}}</td> -->
                                    <td width="15%" class="text-left">{{ $banner->pos}}</td>
                                    <td width="20%" class="text-left">
                                        <a class="preview" href="/{{ $banner->imagen }}" rel="prettyPhoto">
                                            <img src="/{{ $banner->imagen }}" alt="banner" style="max-height: 80px;">
                                        </a>
                                    </td>
                                    <td width="25%" class="text-left">
                                        <a href="banner/{{$banner->id_banner}}/edit" class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated bounce" data-toggle="tooltip" data-original-title="Editar registro" data-placement="top">
                                          <i class="fa fa-pencil" ></i>
                                        </a>
                                        {{ Form::open(array('url' => 'plataforma/banner/'.$banner->id_banner)) }}
                                        {{ Form::hidden("_method", "DELETE") }}
                                        {{ Form::submit("x", array('class' => 'btn btn-xs btn-danger pull-left right15', 'onclick' => 'return confirm("Seguro que deseas eliminar?");')) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No hay registros disponibles</p>
                    @endif

                </div>
            </div>
        </section>
    </div>


@stop
