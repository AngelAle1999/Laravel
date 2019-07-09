
<!DOCTYPE html>
<html class=" ">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/logo-folded.png')}}">
    <title>@yield('title', 'Plataforma : Administración')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Laravel boilerplate" name="description" />
    <meta content="Fraktalweb" name="author" />

    <!-- CORE CSS FRAMEWORK - START -->
    {{Html::style('assets/plugins/pace/pace-theme-flash.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/bootstrap/css/bootstrap.min.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/bootstrap/css/bootstrap-theme.min.css', array('media'=>'screen'))}}
    {{Html::style('assets/fonts/font-awesome/css/font-awesome.css', array('media'=>'screen'))}}
    {{Html::style('assets/css/animate.min.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/perfect-scrollbar/perfect-scrollbar.css', array('media'=>'screen'))}}
    <!-- CORE CSS FRAMEWORK - END -->

    {{Html::style('assets/plugins/jquery-ui/smoothness/jquery-ui.min.css', array('media'=>'screen')) }}
    {{Html::style('assets/plugins/datepicker/css/datepicker.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/daterangepicker/css/daterangepicker-bs3.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/daterangepicker/css/daterangepicker-bs3.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/datetimepicker/css/datetimepicker.min.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/timepicker/css/timepicker.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/datatables/css/jquery.dataTables.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css', array('media'=>'screen'))}}
    {{Html::style('assets/plugins/select2/select2.css', array('media'=>'screen')) }}
    {{Html::style('assets/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css', array('media' => 'screen'))}}
    {{Html::style('assets/plugins/messenger/css/messenger.css')}}
    {{Html::style('assets/plugins/messenger/css/messenger-theme-future.css')}}
    {{Html::style('assets/plugins/messenger/css/messenger-theme-flat.css')}}
    {{Html::style('assets/plugins/icheck/skins/all.css', array('media'=>'screen')) }}
    {{Html::style('assets/plugins/multi-select/css/multi-select.css', array('media' => 'screen')) }}
    {{Html::style('assets/plugins/prettyphoto/prettyPhoto.css', array('media' => 'screen')) }}
    {{Html::style('assets/plugins/tagsinput/css/bootstrap-tagsinput.css', array('media' => 'screen')) }}




      <!-- CORE CSS TEMPLATE - START -->
      {{Html::style('assets/css/style.css', array('media'=>'screen'))}}
      {{Html::style('assets/css/responsive.css', array('media'=>'screen'))}}
      {{Html::style('css/main.css', array('media'=>'screen'))}}
      <!-- CORE CSS TEMPLATE - END -->

    @yield('head')

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class=" "><!-- START TOPBAR -->

<div class='page-topbar'>
    <div class='logo-area'>
    </div>
    <div class='quick-area'>
        <div class='pull-left'>
            <ul class="info-menu left-links list-inline list-unstyled">
                <li class="sidebar-toggle-wrap">
                    <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class='pull-right'>
            <ul class="info-menu right-links list-inline list-unstyled">
                <li class="profile">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        @if(Auth::check() && strlen(Auth::User()->img)>5)
                          <img src="/{{Auth::user()->img}}" alt="user-image" class="img-circle img-inline">
                        @else
                          <img src="{{URL::asset('assets/images/avatar2.jpg')}}" alt="user-image" class="img-circle img-inline">
                        @endif
                        <!-- <img src="{{URL::asset('assets/images/avatar2.jpg')}}" alt="user-image" class="img-circle img-inline"> -->
                        <span>
                          @if(Auth::check())
                            {{ Auth::User()->name }}
                          @else
                            Administrador
                          @endif
                         <i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu profile animated fadeIn">
                      @if(Auth::check())
                        <li>
                              <a href="usua/{{Auth::user()->id_user}}/edit">
                              <i class="fa fa-user"></i>
                              Editar Perfil
                            </a>
                        </li>
                      @endif
                        <!-- <li>
                            <a href="#help">
                                <i class="fa fa-info"></i>
                                Ayuda
                            </a>
                        </li> -->
                        <li class="last">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-lock"></i>
                                Salir
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>

</div>
<!-- END TOPBAR -->
<!-- START CONTAINER -->

<div class="page-container row-fluid" >

    <!-- SIDEBAR - START -->
    <div class="page-sidebar" style="height:100%;">


        <!-- MAIN MENU - START -->
        <div class="page-sidebar-wrapper main-menu-wrapper" id="main-menu-wrapper">

          {{-- <div class="profile-info row">
              <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                  <a href="ui-profile.html">
                      <img src="{{ Auth::user()->id_rol == 1 ? $user->imagen : $user->cliente->img }}" class="img-responsive img-circle">
                  </a>
              </div>
              <div class="profile-details col-md-8 col-sm-8 col-xs-8">
                  <h3>
                      <a href="ui-profile.html">{{ $user->name }}</a>
                      <span class="profile-status online"></span>
                  </h3>
                  <p class="profile-title">{{ Auth::user()->id_rol == 1 ? $user['rol']->rol : $user['cliente']['categoria']->categoria }}</p>
              </div>
          </div> --}}

            <ul class='wraplist'>


                <li class="{{ (Request::is('Plataforma') ? 'open' : '') }}">
                    <a href="/Plataforma">
                        <i class="fa fa-dashboard"></i>
                        <span class="title">{{ trans('Dashboard') }}</span>
                    </a>
                </li>
            <li class="{{ (Request::is('Plataforma/usua*') ? 'open' : '') }}"> {{--  Esta linea hace que se muestre la pestaña en el menu activa --}}
                    <a href="/Plataforma/usua">  {{-- A donde se va a redirigir --}}
                        <i class="fa fa-users"></i>
                        <span class="title">{{ trans('Usuarios') }}</span>
                    </a>
                </li>

                <li class="{{ (Request::is('Plataforma/mob*') ? 'open' : '') }}">
                    <a href="/Plataforma/mob">
                        <i class="fa fa-desktop"></i>
                        <span class="title">{{ trans('Mobiliario') }}</span>
                    </a>
                </li>

                <li class="{{ (Request::is('/Plataforma/plan*') ? 'open' : '') }}">
                    <a href="/Plataforma/plan">
                        <i class="fa fa-file-o"></i>
                        <span class="title">{{ trans('Plantilla') }}</span>
                    </a>
                </li>

                 <li class="{{ (Request::is('/Plataforma/pla*') ? 'open' : '') }}">
                    <a href="/Plataforma/pla">
                        <i class="glyphicon glyphicon-cutlery"></i>
                        <span class="title">{{ trans('Platillos') }}</span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- MAIN MENU - END -->



        <div class="project-info text-center" style="">
          <p> Realizado por el equipo Hecho</p>
        </div>



    </div>
    <!--  SIDEBAR - END -->
    <!-- START CONTENT -->
    <section id="main-content" class="">


        <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;'>

            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class="page-title">

                    <div class="pull-left">
                        <h1 class="title">@yield('main_title')</h1>
                    </div>


                </div>
            </div>
            <div class="clearfix"></div>


            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 100% !important; margin-left: 0px !important; margin-right: 0px !important; padding-left: 0px !important; padding-right: 0px !important;">


                @yield('content')

            </div>



        </section>
    </section>
    <!-- END CONTENT -->


  </div>

<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

@section('footer')

  <!-- CORE JS FRAMEWORK - START -->
  {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js') }}
  <!-- {{-- HTML::script('assets/js/jquery-1.11.2.min.js') --}} -->
  {{ HTML::script('assets/js/jquery.easing.min.js')}}
  {{ HTML::script('assets/plugins/bootstrap/js/bootstrap.min.js')}}
  {{ HTML::script('assets/plugins/pace/pace.min.js')}}
  {{ HTML::script('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}
  {{ HTML::script('assets/plugins/viewport/viewportchecker.js') }}
  {{ HTML::script('js/sliiide.js') }}
  <!-- CORE JS FRAMEWORK - END -->

  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
  {{ HTML::script('assets/plugins/datepicker/js/datepicker.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/daterangepicker/js/moment.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/daterangepicker/js/daterangepicker.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/timepicker/js/timepicker.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/datetimepicker/js/datetimepicker.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/jquery-validation/js/jquery.validate.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/jquery-validation/js/additional-methods.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/js/form-validation.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js', ["type" => "text/javascript"])}}
  {{ Html::script('assets/plugins/jquery-ui/smoothness/jquery-ui.min.js', ["type" => "text/javascript"]) }}
  {{ Html::script('assets/plugins/icheck/icheck.min.js', ["type" => "text/javascript"]) }}
  {{ Html::script('assets/plugins/select2/select2.min.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/multi-select/js/jquery.multi-select.js', ["type" => "text/javascript"])}}
  {{ HTML::script('assets/plugins/multi-select/js/jquery.quicksearch.js', ["type" => "text/javascript"]) }}
  {{ HTML::script('assets/plugins/prettyphoto/jquery.prettyPhoto.js', ["type" => "text/javascript"]) }}

  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


  <!-- CORE TEMPLATE JS - START -->
    {{ HTML::script('assets/js/scripts.js') }}
  <!-- END CORE TEMPLATE JS - END -->




@show

@section('moreJs')

@show

<script type="text/javascript">

  var menu = $('.left-menu').sliiide({place: 'left', exit_selector: '.left-exit', toggle: '#nav-icon2', no_scroll: false});
  $(() => {
    // $('#nav-icon2').on('click', () => {
    //   document.body.scrollTop = 0;
    //   document.documentElement.scrollTop = 0;
    // })
  });
</script>

</body>
</html>
