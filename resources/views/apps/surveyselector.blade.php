<!DOCTYPE html>
<!-- 
Template Name: Conquer - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0.3
Version: 1.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/conquer-responsive-admin-dashboard-template/3716838?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Mandiri Online Survey | Survey Layanan</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{ asset('assets/css/style-conquer.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-boxed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner container">
		<!-- BEGIN LOGO -->
        <a class="navbar-brand" href="{{ url('apps/surveyselector') }}">
          <span class="col-md-12">Survey Mania Mantap</span>
        </a>
		<!-- END LOGO -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
            <li class="devider">
                &nbsp;
            </li>
            <li>
                <a href="{{ url('auth/logout') }}"><i class="fa fa-sign-out"></i> Log Out</a> 
            </li>			
		</ul>
		<!-- END TOP NAVIGATION MENU -->
	</div>
<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<div class="container" style="width:1000px;margin:0 auto;">
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content-wrapper">
			<div class="well">
				<!-- BEGIN PAGE HEADER-->
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN PAGE TITLE-->
						<h3 class="page-title">
						Select Survey
						</h3>
						<!-- END PAGE TITLE-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						<!-- <img width="400" height="400" src="assets/img/mic.jpg" alt=""/> -->
						<!-- BEGIN SURVEY SELECTOR-->
						<div class="list-group">
                            @foreach ($surveyName as $index => $name)
							<a href="{{ url('apps/webapps?id='.$surveyId[$index].'') }}" class="list-group-item bg-red">
							<h4 class="list-group-item-heading">{{ $name }}</h4>
							<p class="list-group-item-text">
								 {{ $surveyDesc[$index] }}
							</p>
                            </a>
                            @endforeach
						</div>
						<!-- END SURVEY SELECTOR-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
<div class="container" style="width:1000px;margin:0 auto;">
	<div class="footer-inner">
		 2016 &copy; Mencoba Magang Inc.
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="{{ asset('assets/plugins/jquery-1.10.2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="{{ asset('assets/scripts/app.js') }}"></script>
<script>
jQuery(document).ready(function() {    
   App.init();
   $('.collapse').on('shown.bs.collapse', function(){
	$(this).parent().find(".fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-up");
	}).on('hidden.bs.collapse', function(){
	$(this).parent().find(".fa-angle-up").removeClass("fa-angle-up").addClass("fa-angle-down");
	});
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>