@extends('Plataforma.layout') @section('title') Isuarios @stop @section('content')

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
                <h2 class="title pull-left">GUARDAR USUARIO</h2>

        </header>
        <div class="content-body">

            <div class="row">
                <?php $lectura = "disabled" ?>
                    @if($user->id_user)
                      <?php $lectura = "enabled" ?>
                    @endif

                    {{ Form::open( array('url' => 'Plataforma/usua/'.$user->id_user, 'method' => 'POST','class' => 'datosPedido', 'enctype' => 'multipart/form-data') ) }}

                        <div class="form-group">
                            {{ Form::label ('titulo', 'Nombre *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('name', $user->name) }}
                                {{ Form::text ('name', $user->name, ['class' => 'form-control name']) }}
                            </div>
                        </div>

                         <div class="form-group">
                            {{ Form::label ('titulo', 'Correo *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('email', $user->email) }}
                                {{ Form::text ('email', $user->email, ['class' => 'form-control Email']) }}
                            </div>
                        </div>


                         <div class="form-group">
                            {{ Form::label ('titulo', 'Contraseña *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('password', $user->password) }}
                                {{ Form::password ('password', $user-> null, ['class' => 'form-control password']) }}
                            </div>
                        </div>

                         <div class="form-group">
                            {{ Form::label ('titulo', 'Id_rol *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                    <select name="id_roles" id="id_roles"  class="'form-control id_roles">
                                        @foreach($roles as $rol)
                                        <option value="{{$rol['id_roles']}}">{{$rol['nombre']}}</option>
                                        @endforeach
                                    </select>
                            </div>

                        @if($user->id_user)
                          {{ Form::hidden ('_method', 'PUT', ['id_user' => 'methodo']) }}
                        @endif

                        <div class="text-right" style="margin-top:120px;">
                             {{ link_to('Plataforma/usua', 'Cancelar', ['class' => 'btn btn-warning']) }}
                            {{ Form::submit('Guardar', ['class' => 'btn btn-success', 'type' => 'submit', 'id_user' => 'guardar']) }}
                        </div>
                        {{ csrf_field() }}
                    {{ Form::close() }}


            </div>
        </div>
    </section>
</div>

@stop