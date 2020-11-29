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
    <link rel="stylesheet" type="text/css" href="/public/libs_pub/sty-02/vendor/plugins/magnific/magnific-popup.css">
    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="/public/libs_pub/sty-02/assets/admin-tools/admin-forms/css/admin-forms.css">
    {{-- Admin Modals CSS --}}
    <link rel="stylesheet" type="text/css" href="/public/libs_pub/sty-02/assets/admin-tools/admin-plugins/admin-modal/adminmodal.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="/public/libs_pub/sty-02/assets/skin/default_skin/css/theme.css"> 

    
    {{-- De  Componentes --}}
    <!-- <link rel="stylesheet" type="text/css" href="/libs/admindesigns/vendor/plugins/slick/slick.css" />
    <link rel="stylesheet" href="/libs/bower_components/select2/dist/css/select2.min.css" type="text/css"/> -->

    <link rel="stylesheet" href="/css/app.css" type="text/css"/> 



    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="/public/libs_pub/sty-02/assets/img/f1icon2.png">

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
    <div id="main">
    <div id="app">
        <!-- Start: Header -->
        <header class="navbar navbar-fixed-top  " :class="estilo.principal_cabecera">
            <ul class="nav navbar-nav navbar-left">
                <div class="" style="padding: 15px 0px 0px 100px">
                    <span class="fs22" style="color: darkblue; letter-spacing: 5px"><b class="" style="color: orange">RE</b>ACTIVA  </span>
                </div>

            </ul>

            {{-- .................................     opciones de usuario --}}
            <ul class="nav navbar-nav navbar-right">
                <li class="ph10 pv20 hidden-xs"> <i class="fa fa-circle text-tp fs8"></i>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
                        {{-- <img src="{{ asset('sty-mode-2/assets/img/avatars/1.jpg') }}" alt="avatar" class="mw30 br64 mr15"> --}}
                        <span>Administrador</span>
                        <span class="caret caret-tp hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">

                        <li class="br-t of-h">
                            {{-- <a href="{{ url('/home') }}" class="fw600 p12 animated animated-short fadeInDown"> --}}
                                <span class="fa fa-gear pr5"></span> Cerrar Modulo </a>
                        </li>
                        <li class="br-t of-h">
                            <a href="#" class="fw600 p12 animated animated-short fadeInDown" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="fa fa-power-off pr5"></span> Cerrar Sesión </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- End: Header -->
 
        







        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">


            <!-- Start: breadcrumb -->
            <!-- ----------------------------  BREAD CRUM -->
            <header id="topbar" class="affix pbn " >
                <div class="row" >
                    <div class="text-center">
                        <h4 id="tituloCabecera"></h4>
                    </div>
                </div>
            </header>
            <!-- End: breadcrumb -->

            <!-- Begin: Content -->
            <!-- =========================== CONTENIDO ============================ -->
            <section id="content" class="table-layout_ animated fadeIn col-md-10 col-md-offset-1" style="min-height: 3500px;">
                @yield('content')
            </section>
            <!-- End: Content -->

        </section>

 
    </div>
    </div>
    <!-- End: Main -->



    <!-- BEGIN: PAGE SCRIPTS -->


    
    @yield('scriptShift')



    <script type="text/javascript" src="/public/libs_pub/sty-02/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/public/libs_pub/sty-02/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="/public/libs_pub/sty-02/assets/js/bootstrap/bootstrap.min.js"></script>

    {{-- <script type="text/javascript" src="/public/libs_pub/sty-02/assets/admin-tools/admin-forms/js/advanced/steps/jquery.steps.js"></script> --}}
   {{--  <script type="text/javascript" src="/public/libs_pub/sty-02/assets/admin-tools/admin-forms/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/public/libs_pub/sty-02/assets/admin-tools/admin-forms/js/additional-methods.min.js"></script> --}}
    <script type="text/javascript" src="/public/libs_pub/sty-02/vendor/plugins/magnific/jquery.magnific-popup.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="/public/libs_pub/sty-02/assets/js/utility/utility.js"></script>
    {{-- <script type="text/javascript" src="/public/libs_pub/admindesigns/assets/js/main.js"></script> --}}
    {{-- <script type="text/javascript" src="/public/libs_pub/admindesigns/assets/js/demo.js"></script> --}}

    {{-- <script type="text/javascript" src="/public/libs_pub/admindesigns/vendor/plugins/slick/slick.min.js"></script> --}}
    
    <script type="text/javascript" src="/public/libs_pub/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script type="text/javascript" src="/public/libs_pub/bower_components/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript" src="/public/libs_pub/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script> 




    <script type="text/javascript">
      

    </script>

</body>

</html>
