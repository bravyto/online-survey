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
                        Users
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <!-- BEGIN CRUD TABLE -->
                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-hover customFontSize">
                            <thead>
                                <tr>
                                    <th style="font-size:16px;">
                                         Username
                                    </th style="font-size:16px;">
                                    <th style="font-size:16px;"> 
                                         Survey Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($accountList as $account)
                            <tr>
                                <td>
                                     {{ $account['username'] }}
                                </td>
                                <td>
                                     {{ $account['status'] }}
                                </td>
                            </tr>     
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-actions fluid">
                        <div class="col-md-offset-9 col-md-9">
                            <button type="button" onclick="location.href = '{{ url('admin/pages/dashboard') }}';" class="btn btn-success">
                                <span class="glyphicon glyphicon-chevron-left"></span>Back To Dashboard 
                            </button>
                        </div>
                    </div>    
                </div>
                <!-- END CRUD TABLE -->
            </div>
        </div>
</div>
    <!-- END CONTENT -->
@stop



