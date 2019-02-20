<!DOCTYPE html>
<html lang="en">
  	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <!-- Meta, title, CSS, favicons, etc. -->
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="images/favicon.ico" type="image/ico" />

    	<title>Agence MR | @yield('title')</title>

	    <!-- Bootstrap -->
	    <link href="{{ asset('gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	    <!-- Font Awesome -->
	    <link href="{{ asset('gentelella-master/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	    <!-- NProgress -->
	    <link href="{{ asset('gentelella-master/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
	    <!-- iCheck -->
	    <link href="{{ asset('gentelella-master/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	
    	<!-- bootstrap-progressbar -->
    	<link href="{{ asset('gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}." rel="stylesheet">
    	<!-- JQVMap -->
    	<link href="{{ asset('gentelella-master/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    	<!-- bootstrap-daterangepicker -->
    	<link href="{{ asset('gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    	<!-- Custom Theme Style -->
    	<link href="{{ asset('gentelella-master/build/css/custom.min.css') }}" rel="stylesheet">
    	<!-- jQuery -->
    	<script src="{{ asset('gentelella-master/vendors/jquery/dist/jquery.min.js') }}"></script>
  	</head>

  	<body class="nav-md">
    	<div class="container body">
      		<div class="main_container">
        		<div class="col-md-3 left_col">
          			<div class="left_col scroll-view">
            			<div class="navbar nav_title" style="border: 0;">
              				<a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Agence MR</span></a>
            			</div>

            			<div class="clearfix"></div>

            			<!-- sidebar menu -->
            			<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              				<div class="menu_section">
                				<h3>General</h3>
                				<ul class="nav side-menu">
				                  	<li><a><i class="fa fa-home"></i> Agence </a></li>
                  					<li><a><i class="fa fa-edit"></i> Projetos </a></li>
                  					<li><a><i class="fa fa-desktop"></i> Administrativo </a></li>
                  					<li><a><i class="fa fa-table"></i> Comercial </a></li>
                  					<li><a><i class="fa fa-bar-chart-o"></i> Financeiro </a></li>
                  					<li class="active"><a href="{{ route('consultores') }}"><i class="fa fa-clone"></i> Consultor </span></a></li>
                  					<li><a><i class="fa fa-clone"></i> Usuário </a></li>
                  					<li><a><i class="fa fa-times"></i> Salir </a></li>
                				</ul>
              				</div>
            			</div>
            			<!-- /sidebar menu -->

			            <!-- /menu footer buttons -->
			            <div class="sidebar-footer hidden-small">
			              	<a data-toggle="tooltip" data-placement="top" title="Settings">
			                	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			              	</a>
			              	<a data-toggle="tooltip" data-placement="top" title="FullScreen">
			                	<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
			              	</a>
			              	<a data-toggle="tooltip" data-placement="top" title="Lock">
			                	<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			              	</a>
			              	<a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
			                	<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			              	</a>
			            </div>
			            <!-- /menu footer buttons -->
          			</div>
        		</div>

        		<!-- top navigation -->
        		<div class="top_nav">
          			<div class="nav_menu">
            			<nav>
			              	<div class="nav toggle">
			                	<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			              	</div>

              				<ul class="nav navbar-nav navbar-right">
                				<li class="">
                  					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    					<img src="{{ asset('img/fotoHombre.png') }}" alt="">Freddy Millán
                  					</a>
                				</li>
                  			</ul>
            			</nav>
          			</div>
        		</div>
        		<!-- /top navigation -->

        		<!-- page content -->
        		<div class="right_col" role="main">
        			@yield('content')
          		</div>
          	</div>
        	<!-- /page content -->

        	<!-- footer content -->
        	<footer>
          		<div class="pull-right">
            		Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          		</div>
          		<div class="clearfix"></div>
        	</footer>
        	<!-- /footer content -->
    	</div>

	    <!-- jQuery -->
	    <script src="{{ asset('gentelella-master/vendors/jquery/dist/jquery.min.js') }}"></script>
	    <!-- Bootstrap -->
	    <script src="{{ asset('gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	    <!-- FastClick -->
	    <script src="{{ asset('gentelella-master/vendors/fastclick/lib/fastclick.js') }}"></script>
	    <!-- NProgress -->
	    <script src="{{ asset('gentelella-master/vendors/nprogress/nprogress.js') }}"></script>
	    <!-- Chart.js -->
	    <script src="{{ asset('gentelella-master/vendors/Chart.js/dist/Chart.min.js') }}"></script>
	    <!-- gauge.js -->
	    <script src="{{ asset('gentelella-master/vendors/gauge.js/dist/gauge.min.js') }}"></script>
	    <!-- bootstrap-progressbar -->
	    <script src="{{ asset('gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
	    <!-- iCheck -->
	    <script src="{{ asset('gentelella-master/vendors/iCheck/icheck.min.js') }}"></script>
	    <!-- Skycons -->
	    <script src="{{ asset('gentelella-master/vendors/skycons/skycons.js') }}"></script>
	    <!-- Flot -->
	    <script src="{{ asset('gentelella-master/vendors/Flot/jquery.flot.js') }}"></script>
	    <script src="{{ asset('gentelella-master/vendors/Flot/jquery.flot.pie.js') }}"></script>
	    <script src="{{ asset('gentelella-master/vendors/Flot/jquery.flot.time.js') }}"></script>
	    <script src="{{ asset('gentelella-master/vendors/Flot/jquery.flot.stack.js') }}"></script>
	    <script src="{{ asset('gentelella-master/vendors/Flot/jquery.flot.resize.js') }}"></script>
	    <!-- Flot plugins -->
	    <script src="{{ asset('gentelella-master/vendors/flot.orderbars/js/jquery.flot.orderBars.jss') }}"></script>
	    <script src="{{ asset('gentelella-master/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
	    <script src="{{ asset('gentelella-master/vendors/flot.curvedlines/curvedLines.js') }}"></script>
	    <!-- DateJS -->
	    <script src="{{ asset('gentelella-master/vendors/DateJS/build/date.js') }}"></script>
	    <!-- JQVMap -->
	    <script src="{{ asset('gentelella-master/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
	    <script src="{{ asset('gentelella-master/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
	    <script src="{{ asset('gentelella-master/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
	    <!-- bootstrap-daterangepicker -->
	    <script src="{{ asset('gentelella-master/vendors/moment/min/moment.min.js') }}"></script>
	    <script src="{{ asset('gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

	    <!-- Custom Theme Scripts -->
	    <script src="{{ asset('gentelella-master/build/js/custom.min.js') }}"></script>
  	</body>
</html>
