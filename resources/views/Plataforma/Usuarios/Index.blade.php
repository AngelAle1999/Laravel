@extends('plataforma.layout')


@section('title') Usuarios @stop

@section('content')

    <div class="col-md-12">
        <section class="box ">
          <header class="panel_header">
              <h2 class="title pull-left">Usuarios</h2>
              <div class="actions panel_actions pull-right">
                  {{ Html::link('usua/create', 'Crear Nuevo', array('class' => 'btn btn-info')) }}
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
                    @if ($usua->count())
                         <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Correo</th>
                                                    <th>Contraseña</th>
                                                    <th>Id_Rol</th>
                                                    <th>Opciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($usua as $usuario)
                                                <tr>
                                                    <td>{{$usuario->name}}</td>
                                                    <td>{{$usuario->email}}</td>
                                                    <td>{{$usuario->password}}</td>
                                                    <td>{{$usuario->id_roles}}</td>
                                                     <td width="25%" class="text-left">
                                        <a href="usua/{{$usuario->id_user}}/edit" class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated bounce" data-toggle="tooltip" data-original-title="Editar registro" data-placement="top">
                                          <i class="fa fa-pencil" ></i>
                                        </a>
                                        {{ Form::open(array('url' => 'usua/'.$usuario->id_user)) }}
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
