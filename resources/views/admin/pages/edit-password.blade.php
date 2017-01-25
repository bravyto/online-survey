@extends('admin.layout.default')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title" style="font-size:28px;">
                        Edit Password
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <div class="portlet-body form">

                    @if (Session::get('inputError') != '')
                        <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input<br><br>
                          <ul>
                            <?='<span style="font-size: 16px; color: red">'.Session::get('inputError').'</span>'?>
                          </ul>
                        </div>
                    @endif

                    @if (Session::get('successMsg') != '')
                        <div class="alert alert-success">
                          <strong>Congrats!</strong><br><br>
                          <ul>
                            <?='<span style="font-size: 16px; color: green">'.Session::get('successMsg').'</span>'?>
                          </ul>
                        </div>
                    @endif

                    <!-- BEGIN FORM-->
                    <form action="{{ url('admin/pages/edit-password') }}" class="form-horizontal" method="post" id="editPassword">
                        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

                            <div class="form-group">
                                <label class="col-md-3 control-label">Old Password</label>
                                <div class="col-md-4 input-icon">
                                    <i class="fa fa-barcode"></i>
                                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="" name="old_password" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">New Password</label>
                                <div class="col-md-4 input-icon">
                                    <i class="fa fa-barcode"></i>
                                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="" name="password" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirm password</label>
                                <div class="col-md-4 input-icon">
                                    <i class="fa fa-barcode"></i>
                                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="" name="conf_password" value="">
                                </div>
                            </div>
                 
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
</div>
    <!-- END CONTENT -->


@stop



