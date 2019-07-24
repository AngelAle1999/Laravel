@extends('Plataforma.layout')

@section('title') Platillo @stop

@section('content')

  <div class="col-md-12">
    <section class="box ">
      <header class="panel_header">
        <h2 class="title pull-left">Platillos</h2>
          <div class="actions panel_actions pull-right">
            {{ Html::link('Plataforma/platillo/create', 'Crear Nuevo', array('class' => 'btn btn-info')) }}
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
          @if ($platillos->count())
          <div class="table-responsive">
            <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>name</th>
                  <th>img_url</th>
                  <th>description</th>
                  <th>price</th>
                  <th>amount</th>
                  <th>infant price</th>
                  <th>Type id</th>
                  <th>Condition numbre people 1</th>
                  <th>Price number people 1</th>
                  <th>Condition numbre people 2</th>
                  <th>Price number people 2</th>
                  <th>Condition amount 1</th>
                  <th>Price amount 1</th>
                  <th>Condition amount 2</th>
                  <th>Price amount 2</th>
                  <th>baja</th>
                </tr>
              </thead>
              <tbody>
                @foreach($platillos as $platillo)
                  <tr>
                    <td>{{$platillo->name}}</td>
                    <td>{{$platillo->img_url}}</td>
                    <td>{{$platillo->status}}</td>
                    <td>{{$platillo->descripcion}}</td>
                    <td>{{$platillo->price}}</td>
                    <td>{{$platillo->amount}}</td>
                    <td>{{$platillo->type_id}}</td>
                    <td>{{$platillo->condition_number_people_1}}</td>
                    <td>{{$platillo->price_number_people_1}}</td>
                    <td>{{$platillo->condition_number_people_2}}</td>
                    <td>{{$platillo->price_number_people_2}}</td>
                    <td>{{$platillo->condition_amount_1}}</td>

                    <td>{{$platillo->price_amount_1}}</td>
                    <td>{{$platillo->condition_amount_2}}</td>
                    <td>{{$platillo->price_amount_2}}</td>
                    <td>{{$platillo->baja}}</td>
                    <td width="25%" class="text-left">
                      <a href="platillo/{{$platillo->Id_platillo}}/edit" class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated bounce" data-toggle="tooltip" data-original-title="Editar registro" data-placement="top">
                        <i class="fa fa-pencil" ></i>
                      </a>
                      {{ Form::open(array('url' => 'Plataforma/platillo/'.$platillo->Id_platillo)) }}
                      {{ Form::hidden("_method", "DELETE") }}
                      {{ Form::submit("x", array('class' => 'btn btn-xs btn-danger pull-left right15', 'onclick' => 'return confirm("Seguro que deseas eliminar?");')) }}
                      {{ Form::close() }}
                    </td>
                  @endforeach                                   
                </tr>                                    
              </tbody>
            </table>
          </div>                    
          @else
            <p>No hay registros disponibles</p>
          @endif
        </div>
      </div>
    </section>
  </div>


@stop
