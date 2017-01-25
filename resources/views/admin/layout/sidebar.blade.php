<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<div class="clearfix">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="{{ $dashboard }}">
					<a href="{{ url('admin/pages/dashboard') }}">
					<i class="fa fa-home"></i>
					<span class="title">
						Dashboard
					</span>
					<span class="">
					</span>
					</a>
				</li>
				<li class="{{ $layanan }}">
					<a href="{{ url('admin/pages/layanan') }}">
					<i class="fa fa-check"></i>
					<span class="title">
						Survey
					</span>
					<span class="">
					</span>
					</a>
				</li>
				<li class="{{ $ubah_password }}">
					<a href="{{ url('admin/pages/edit-password') }}">
					<i class="fa fa-barcode"></i>
					<span class="title">
						Edit Password
					</span>
					<span class="">
					</span>
					</a>
				</li>				
				<input type="hidden" value="{{ $pengguna }}">
<!-- 				<li class="{{ $pengguna }}">
					<a href="{{ url('admin/pages/pengguna') }}">
					<i class="fa fa-user"></i>
					<span class="title">
						Pengguna
					</span>
					<span class="">
					</span>
					</a>
				</li> -->
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
</div>
<!-- END SIDEBAR -->