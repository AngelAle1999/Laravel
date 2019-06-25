@extends('Plataforma.layout')


@section('title') {{ trans('Dashboard') }} @stop

@section('main_title') {{ trans('Dashboard') }} @stop

@section('content')


    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left"></h2>
                <div class="actions panel_actions pull-right">
                    <i class="box_toggle fa fa-chevron-down"></i>
                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                    <i class="box_close fa fa-times"></i>
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
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </div>
        </section>
    </div>


    <div class="col-md-12">

        <div class="row">

            <a href="{{url('/plataforma/inventario')}}">
              <div class="col-md-4 col-sm-6 col-xs-6">
                  <div class="r4_counter db_box">
                      <i class="pull-left fa fa-cubes icon-md icon-rounded icon-primary"></i>
                      <div class="stats">
                          <h4><strong>{{ Html::link('/plataforma/inventario', 0) }}</strong></h4>
                          <span class="hidden-xs">Something</span>
                      </div>
                  </div>
              </div>
            </a>

            <a href="{{url('/plataforma/cotizaciones')}}">
              <div class="col-md-4 col-sm-6 col-xs-6">
                  <div class="r4_counter db_box">
                      <i class="pull-left fa fa-dollar icon-md icon-rounded icon-orange"></i>
                      <div class="stats">
                          <h4><strong>{{ Html::link('/plataforma/cotizaciones', 0) }}</strong></h4>
                          <span class="hidden-xs">Something</span>
                      </div>
                  </div>
              </div>
            </a>

            <a href="{{url('/plataforma/clientes')}}">
              <div class="col-md-4 col-sm-6 col-xs-6">
                  <div class="r4_counter db_box">
                      <i class="pull-left fa fa-users icon-md icon-rounded icon-purple"></i>
                      <div class="stats">
                          <h4><strong>{{ Html::link('/plataforma/clientes', 0) }}</strong></h4>
                          <span class="hidden-xs">Something</span>
                      </div>
                  </div>
              </div>
            </a>

        </div>

    </div>





@stop
