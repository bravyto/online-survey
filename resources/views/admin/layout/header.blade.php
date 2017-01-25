<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top hidden-print">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div style="height: 100%;" class="header-inner">
		<!-- BEGIN LOGO -->
        <a href="{{ url('admin/pages/dashboard') }}">
          <img height="90%" alt="" src="{{ asset('assets/img/mandirios-alt3.png') }}" style="padding-top: 5px; padding-left: 10px;">
        </a>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="{{ URL::asset('assets/img/menu-toggler.png') }}" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
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