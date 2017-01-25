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
                        Start Survey
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ url('admin/pages/start-survey-f') }}" class="form-horizontal" id="createUser" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="form-body">
            
                            @for($i=0; $i<$counter; $i++)

                            <input type="" class="hidden" placeholder="" value="" name="id">

                            <label class="col-md-3 control-label">User {{ $i+1 }}</label>
                            <br>
                            <br>
                            <div class="form-group {{ $error }}">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-4 input-icon">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" placeholder="username" name="username[]">
                                </div>
                            </div>

                            <div class="form-group {{ $error }}"> 
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-4 input-icon">
                                    <i class="fa fa-barcode"></i>
                                    <input type="password" class="form-control" placeholder="password" value="" name="password[]">
                                </div>
                            </div>

                            @endfor

                            </div>
                        </div>
                        
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                
                                <input class="hidden" name="name" value="{{ $name }}">
                                <input class="hidden" name="desc" value="{{ $description }}">
                                
                                <button type="button" onclick="location.href = '{{ url('admin/pages/start-survey') }}';" class="btn btn-default">Cancel</button>
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



