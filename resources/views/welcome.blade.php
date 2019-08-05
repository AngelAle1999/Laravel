<html class=" ">
    
<!-- Mirrored from jaybabani.in/ultra-admin/form-wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jun 2015 14:44:44 GMT -->
<head>
        <!-- 
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 1.0
         * This file is part of Ultra Admin Theme.
        -->
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Cotizador</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
        




        <!-- CORE CSS FRAMEWORK - START -->
        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body >
      
            <!-- START CONTENT -->
                <section class="wrapper" style='margin-top:0px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

                    <div class='col-lg-50 col-md-50 col-sm-50 col-xs-50'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Cotizador</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-50">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Datos</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-50 col-sm-50 col-xs-50">

                                        <form id="commentForm">

                                            <div id="pills"class='wizardpills' >
                                                <ul class="form-wizard">
                                                    <li><a href="#pills-tab1" data-toggle="tab"><span>¿Que quieres?</span></a></li>
                                                    <li><a href="#pills-tab2" data-toggle="tab"><span>¿Para cuando?</span></a></li>
                                                    <li><a href="#pills-tab3" data-toggle="tab"><span>¿ En donde?</span></a></li>
                                                    <li><a href="#pills-tab4" data-toggle="tab"><span>Extras</span></a></li>
                                                    <li><a href="#pills-tab5" data-toggle="tab"><span>Dejanos tus datos</span></a></li>
                                                </ul>
                                                <div id="bar" class="progress active">
                                                    <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane" id="pills-tab1">

                                                        <h4>Platillos</h4><br>
                                                        <div class="form-group">
                                                            <label class="form-label" for="field-1">Platillo</label>
                                                            <div class="controls">
                                                                <input type="text" placeholder="Platillo" class="form-control" name="txtFullName" id="txtFullName">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label" for="field-1">Tipo de platillo</label>
                                                            <div class="controls">
                                                                <input type="text" placeholder="Tipo de platillo" class="form-control" name="txtEmail" id="txtEmail">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label" for="field-1">Numero de personas</label>
                                                            <div class="controls">
                                                                <input type="text" placeholder="Personas" class="form-control" name="txtPhone" id="txtPhone">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane" id="pills-tab2">
                                                        <h4>Fecha de entrega</h4><br>
                                                        <p>Form goes here</p>
                                                    </div>
                                                    <div class="tab-pane" id="pills-tab3">
                                                        <h4>Direccion</h4><br>
                                                        <p>Form goes here</p>
                                                    </div>
                                                    <div class="tab-pane" id="pills-tab4">
                                                        <h4>Mobiliario</h4><br>
                                                        <p>Form goes here</p>
                                                    </div>
                                                    <div class="tab-pane" id="pills-tab5">
                                                        <h4>Datos de cliente</h4><br>
                                                        <p>Form goes here</p>
                                                    </div>

                                                    <div class="clearfix"></div>

                                                    <ul class="pager wizard">
                                                        <li class="previous first" style="display:none;"><a href="javascript:;">Primero</a></li>
                                                        <li class="previous"><a href="javascript:;">Anterior</a></li>
                                                        <li class="next last" style="display:none;"><a href="javascript:;">Ultimo</a></li>
                                                        <li class="next"><a href="javascript:;">Siguiente</a></li>
                                                        <li class="finish"><a href="javascript:;">Final</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section></div>

                </section>
            </section>
            <!-- END CONTENT -->
           
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script> <script src="assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script> <script src="assets/js/form-validation.js" type="text/javascript"></script> <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
    </body>

<!-- Mirrored from jaybabani.in/ultra-admin/form-wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jun 2015 14:44:46 GMT -->
</html>



