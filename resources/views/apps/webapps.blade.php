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
<link rel="icon" type="image/png" href="{{ asset('assets/img/mandiri-icon.png') }}"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-boxed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div style="height: 100%;" class="header-inner container">
		<!-- BEGIN LOGO -->
		<a>
          <img height="90%" alt="" src="{{ asset('assets/img/mandirios-alt3.png') }}" style="padding-top: 0px; padding-left: 0px;">
        </a>
		<!-- END LOGO -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
            <li>
                <a style="color: #000000;" href="{{ url('auth/logout') }}"><i class="fa fa-sign-out"></i> Log Out</a> 
            </li>				
		</ul>
		<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<div class="container" style="margin:0 auto;">
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content-wrapper">
			<div class="well">
				<!-- BEGIN PAGE HEADER-->
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<!-- BEGIN PAGE TITLE-->
						<h3 class="page-title">
						{{ $name }}
						</h3>
						<!-- END PAGE TITLE-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<!-- <img width="400" height="400" src="assets/img/mic.jpg" alt=""/> -->
						<!-- BEGIN GENERAL DESCRIPTION-->
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-file-text-o"></i>Deskripsi Umum
								</div>
								<!-- <div class="tools">
									<a href="javascript:;" class="collapse"></a>
								</div> -->
							</div>
							<div class="portlet-body">
							{!! $desc !!}
							</div>
						</div>
						<!-- END GENERAL DESCRIPTION-->
						<!-- BEGIN SURVEY-->
						<form class="login-form" action="{{ url('apps/webapps') }}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" name="name" value="{{ $name }}">
							<div class="portlet">
								<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-tasks"></i>Kuesioner
								</div>
								<!-- <div class="tools">
									<a href="javascript:;" class="collapse"></a>
								</div> -->
							</div>
							<!-- BEGIN SUB-SURVEY-->
							<div class="portlet-body">
								<div class="panel-group accordion" id="accordion1">
                                    
                                    @foreach($data as $index => $kuesioner)
                                    
									<div class="panel panel-default">
										<div class="panel-heading" data-toggle="collapse" data-parent="#accordion1" href="#collapse_{{ $index + 1 }}">
											<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_{{ $index + 1 }}">
											<span class="fa fa-angle-down pull-right"></span>
											 {{ $kuesioner['name'] }}</a>
											</h4>
										</div>
									<div id="collapse_{{ $index + 1 }}" class="panel-collapse collapse out">
										<div class="panel-body">
											<div class="alert alert-info">
												<strong>Deskripsi:</strong>
												<label>
													 {!! $kuesioner['description'] !!}
												</label>
											</div>
                                            
                                            @foreach ($kuesioner['data'] as $indexnya => $datanya)
											<div class="note note-info">
												<div class="form-group">
													<label>
														{{ $indexnya + 1 }}. {!! $datanya !!}
													</label>
													<div class="radio-list">
														<label>
														<input style="margin-left: 0px;" type="radio" name="optionsRadios{{ $index }}_{{ $indexnya }}" value="5" required>Sangat Memuaskan</label>
														<label>
														<input type="radio" name="optionsRadios{{ $index }}_{{ $indexnya }}" value="4">Memuaskan</label>
														<label>
														<input type="radio" name="optionsRadios{{ $index }}_{{ $indexnya }}" value="3">Kurang Memuaskan</label>
														<label>
														<input type="radio" name="optionsRadios{{ $index }}_{{ $indexnya }}" value="2">Tidak Memuaskan</label>
														<label>
														<input type="radio" name="optionsRadios{{ $index }}_{{ $indexnya }}" value="1">Sangat Tidak Memuaskan</label>
														<label>
														<input type="radio" name="optionsRadios{{ $index }}_{{ $indexnya }}" value="0">N/A</label>
													</div>
												</div>
											</div>
                                            @endforeach
											<div class="note note-info">
												<div class="form-group">
													<label>Saran untuk perbaikan:</label>
													<textarea class="form-control" name="saran[]" rows="3" style="resize: none;"></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
                                    
                                @endforeach
                                    
                                    
                                    
							</div>
							<!-- END SUB-SURVEY-->
							</div>
						</div>
							<div class="form-actions">
			                    <button type="submit" class="btn btn-success btn-block" id="validate">
		                        	Submit
		                    	</button>
			                </div>

						
						<!-- END SURVEY-->
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
<!-- BEGIN MODAL -->
<div id="openMd1" class="modal fade" tabindex="-1" aria-hidden="true"> 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h3 class="modal-title">Anda yakin ingin dengan jawaban Anda?</h3>

                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                    <button type="submit" class="btn btn-success">Lanjut</button>
                </div>
            </div>

        </div>
    </div>
</div>
						</form>
<!-- END MODAL -->
<!-- BEGIN FOOTER -->
<div class="footer">
<div class="container" style="width:1000px;margin:0 auto;">
	<div class="footer-inner">
		 2016 &copy; Tim Magang Drie Vrienden
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
    <script type="text/javascript">
        $('#validate').on('click', function() {
            @foreach($data as $index => $kuesioner)
                @foreach ($kuesioner['data'] as $indexnya => $datanya)
                        $("#collapse_{{ $index + 1 }}").removeClass("in");
                        $("#collapse_{{ $index + 1 }}").addClass("collapse");
                        $("#collapse_{{ $index + 1 }}").siblings().addClass("collapsed");             
                        $("#collapse_{{ $index + 1 }}").siblings().children().children().children().removeClass("fa-angle-up");
                        $("#collapse_{{ $index + 1 }}").siblings().children().children().children().addClass("fa-angle-down");
                @endforeach
            @endforeach
            
            @foreach($data as $index => $kuesioner)
                @foreach ($kuesioner['data'] as $indexnya => $datanya)
                    var nilai = $('input[name="optionsRadios{{ $index }}_{{ $indexnya }}"]:checked').val();
                    if(nilai > -1) {
                    } else {
                        $("#collapse_{{ $index + 1 }}").removeClass("collapse");
                        $("#collapse_{{ $index + 1 }}").addClass("in");
                        $("#collapse_{{ $index + 1 }}").siblings().removeClass("collapsed");             
                        $("#collapse_{{ $index + 1 }}").siblings().children().children().children().removeClass("fa-angle-down");
                        $("#collapse_{{ $index + 1 }}").siblings().children().children().children().addClass("fa-angle-up");
                        document.getElementById("collapse_{{ $index + 1 }}").style.height="auto";
                        return;
                    }
                @endforeach
            @endforeach
        });
    </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>