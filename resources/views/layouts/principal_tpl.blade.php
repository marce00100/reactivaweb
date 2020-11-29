<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Reactiva</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="./public/libs_pub/sty-02/vendor/plugins/magnific/magnific-popup.css">
    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="./public/libs_pub/sty-02/assets/admin-tools/admin-forms/css/admin-forms.css">
    {{-- Admin Modals CSS --}}
    <link rel="stylesheet" type="text/css" href="./public/libs_pub/sty-02/assets/admin-tools/admin-plugins/admin-modal/adminmodal.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="./public/libs_pub/sty-02/assets/skin/default_skin/css/theme.css"> 

    
    {{-- De  Componentes --}}
    <!-- <link rel="stylesheet" type="text/css" href="/libs/admindesigns/vendor/plugins/slick/slick.css" />
    <link rel="stylesheet" href="/libs/bower_components/select2/dist/css/select2.min.css" type="text/css"/> -->





    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="./public/libs_pub/sty-02/assets/img/f1icon2.png">

    <style media="screen">        

        /*demo styles*/
        body {
            min-height: 2000px;
        }
        .custom-nav-animation li {
            display: none;
        }
        .custom-nav-animation li.animated {
            display: block;
        }

        /* nav fixed settings */
        ul.tray-nav.affix {
            width: 319px;
            top: 80px;
        }
    </style>




</head>

<body class="admin-panels-page sb-l-c sb-l-o" data-spy="scroll" data-target="#nav-spy" data-offset="300">
    <!-- Start: Main -->

        <!-- Start: Header -->
        <div class="navbar navbar-fixed-top bg-white p10" style="height: 80px; border-bottom: solid 1px grey">
            <ul class="nav navbar-nav navbar-left">
                <div class="pl30" >
                    <a href="http://fdbb661.online-server.cloud/wordpress/" title="Sitio de Prueba" rel="home">
                        <img class="header-image is-logo-image" alt="Sitio de Prueba" src="http://fdbb661.online-server.cloud/wordpress/wp-content/uploads/2020/11/logo-1.png" title="Sitio de Prueba" style="width:180px">
                    </a>
                </div>
                

            </ul> 
            <ul class="nav navbar-nav navbar-right">
                <div class="" style="padding: 15px 0px 0px 0px">
                    <span class="mr10 h-120  p15 bg-dark"><a href="#" class="text-white">Contenidos </a> </span>
                    <span class="mr10 h-120  p15 bg-dark"><a href="#" class="text-white">Noticias </a> </span>
                    <span class="mr10 h-120  p15 bg-dark"><a href="#" class="text-white">Estadisticas </a> </span>
                    <span class="mr10 h-120  p15 bg-dark"><a href="#" class="text-white">Ajustes </a> </span>
                </div>
                

            </ul> 


            {{-- .................................     opciones de usuario --}}
            
        </div>
        <!-- End: Header -->
 








        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper" >

 
            <!-- Begin: Content -->
            <!-- =========================== CONTENIDO ============================ -->
            <section id="content" class="table-layout_ animated fadeIn col-md-10 col-md-offset-1" style="min-height: 3500px; margin-top: 70px">
                @yield('content')
            </section>
            <!-- End: Content -->

        </section>

 

    <!-- End: Main -->



    <!-- BEGIN: PAGE SCRIPTS -->


    
    @yield('scriptShift')



    {{-- <script type="text/javascript" src="./public/libs_pub/sty-02/vendor/jquery/jquery-1.11.1.min.js"></script> --}}
    <script type="text/javascript" src="./public/libs_pub/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="./public/libs_pub/sty-02/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="./public/libs_pub/sty-02/assets/js/bootstrap/bootstrap.min.js"></script>

    {{-- <script type="text/javascript" src="./public/libs_pub/sty-02/assets/admin-tools/admin-forms/js/advanced/steps/jquery.steps.js"></script> --}}
   {{--  <script type="text/javascript" src="./public/libs_pub/sty-02/assets/admin-tools/admin-forms/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="./public/libs_pub/sty-02/assets/admin-tools/admin-forms/js/additional-methods.min.js"></script> --}}
    <script type="text/javascript" src="./public/libs_pub/sty-02/vendor/plugins/magnific/jquery.magnific-popup.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="./public/libs_pub/sty-02/assets/js/utility/utility.js"></script>
    {{-- <script type="text/javascript" src="./public/libs_pub/admindesigns/assets/js/main.js"></script> --}}
    {{-- <script type="text/javascript" src="./public/libs_pub/admindesigns/assets/js/demo.js"></script> --}}

    {{-- <script type="text/javascript" src="./public/libs_pub/admindesigns/vendor/plugins/slick/slick.min.js"></script> --}}
    
    <script type="text/javascript" src="./public/libs_pub/select2-4.0.12/dist/js/select2.full.min.js"></script>
    <script type="text/javascript" src="./public/libs_pub/lodash/lodash.min.js"></script>

    <script type="text/javascript" src="./public/libs_pub/bower_components/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript" src="./public/libs_pub/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script> 




    <script type="text/javascript">
        $(function(){

            
        })
      

    </script>
    @stack('script-head')

</body>

</html>
