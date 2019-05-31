@extends('plataforma.layout') @section('title') Banners @stop @section('content')

<div class="col-md-6">

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

                    {{ Form::open( array('url' => 'usua/'.$user->id_user, 'method' => 'POST','class' => 'datosPedido', 'enctype' => 'multipart/form-data') ) }}

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
                                {{ Form::text ('password', $user->password, ['class' => 'form-control password']) }}
                            </div>
                        </div>

                         <div class="form-group">
                            {{ Form::label ('titulo', 'Id_rol *', ['class' => 'form-label']) }}
                            <div class="controls">
                                <i class=""></i>
                                {{ Form::hidden('id_roles', $user->id_roles) }}
                                {{ Form::text ('id_roles', $user->id_roles, ['class' => 'form-control id_roles']) }}
                            </div>

                        @if($user->id_user)
                          {{ Form::hidden ('_method', 'PUT', ['id_user' => 'methodo']) }}
                        @endif

                        <div class="text-right" style="margin-top:120px;">
                             {{ link_to('usua', 'Cancelar', ['class' => 'btn btn-warning']) }}
                            {{ Form::submit('Guardar', ['class' => 'btn btn-success', 'type' => 'submit', 'id_user' => 'guardar']) }}
                        </div>
                        {{ csrf_field() }}
                    {{ Form::close() }}


            </div>
        </div>
    </section>
</div>

@stop