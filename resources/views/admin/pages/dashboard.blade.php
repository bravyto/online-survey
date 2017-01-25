@extends('admin.layout.default')

@section('content')
    <!-- BEGIN PAGE LEVEL SCRIPT -->
    <script type="text/javascript">
        $(document).ready(function() {
            var wrapper = $(".input_fields_wrap"); //Fields wrapper    
            
            $(wrapper).on("click",".removeButton", function(e){ //user click on remove text

                e.preventDefault();

                var curID = 0;
                var flag = "form";
                
                var formID = "myForm_"
                var aTitle = "Deleted!";
                var aSentence = "You will not be able to recover this survey!";
                var aSentence2 = "Yes, delete it!"; 
                var aSentence3 = "This survey has been deleted.";   

                flag = $(this).parent().find("input[name='flag']").val();
                curID = $(this).parent().find("input[name='counter']").val();

                if(flag == "form2"){

                    formID = "myForm2_";
                    aTitle = "Stopped!";
                    aSentence = "You are about to stop this survey!";
                    aSentence2= "Yes, stop it!";
                    aSentence3 = "This survey has been stopped.";
                }

                swal({   

                    title: "Are you sure?",   
                    text: aSentence,   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: aSentence2,   
                    closeOnConfirm: false 
                }, 

                function(){  

                    swal({

                    title: aTitle,   
                    text: aSentence3,   
                    type: "success",   
                    confirmButtonText: "OK!"                        
                    },

                    function(){
                        
                        document.forms[formID+""+curID].submit();
                    }
                    ); 
                });
            })
        });
    </script>
    <!-- END PAGE LEVEL SCRIPT -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">
                    Dashboard
                    </h3>
                    <!-- END PAGE TITLE-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <div class="clearfix">
            </div>
            <div class="clearfix">
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-tasks"></i>All Surveys
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        Survey Name
                                    </th>
                                    <th>
                                        Number of Respondents
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $index => $datanya)
                                <tr>
                                    <td>
                                        {{ $datanya['name'] }}
                                    </td>
                                    <td>
                                        <form method="post" action="{{ url('admin/pages/dashboard') }}">
                                         {{ $datanya['totalCompleted'] }}/{{ $datanya['total'] }}
                                            <input class="hidden" name="id" value="{{ $datanya['id'] }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="pull-right">
                                                <button type="submit" style="display: inline-block;" formaction="{{ url('admin/pages/pengguna') }}" class="btn btn-default btn-xs" style=""><i class="fa fa-user"></i> Users</button>
                                                <button type="submit" style="display: inline-block;" class="btn btn-default btn-xs" style=""><i class="fa fa-edit"></i> Edit</button>
                                            </div>
                                        </form>    
                                    </td>
                                    <td>
                                        @if ($datanya['status'] === 'Ongoing'  )
                                        <span class="label label-primary">
                                             {{ $datanya['status'] }}
                                        </span>
                                        @else
                                        <span class="label label-success">
                                             {{ $datanya['status'] }}
                                        </span>
                                        @endif
                                    </td> 
                                    <td>
                                        <form action="{{ url('admin/pages/surveystop') }}" method="get" style="display: inline-block" class="input_fields_wrap" id="myForm2_{{ $index }}">
                                            <input class="hidden" name="id" value="{{ $datanya['id'] }}">
                                            <input class="hidden" name="counter" value="{{ $index }}">
                                            <input class="hidden" name="flag" value="form2">

                                            <button type="submit" class="btn btn-info btn-xs" formaction="{{ url('admin/pages/surveydetail') }}" onclick="">
                                                <span class="glyphicon glyphicon-search"></span> View
                                            </button>
                                            @if ($datanya['status'] === 'Ongoing'  )
                                                <button type="submit" class="btn btn-danger btn-xs removeButton">
                                                    <span class="glyphicon glyphicon-stop"></span> Stop
                                                </button>
                                            @endif 
                                        </form>
                                        <form action="{{ url('admin/pages/surveydelete') }}" method="get" class="input_fields_wrap" id="myForm_{{ $index }}" style="display: inline-block">
                                            <input class="hidden" name="id" value="{{ $datanya['id'] }}">
                                            <input class="hidden" name="counter" value="{{ $index }}">
                                            <input class="hidden" name="flag" value="form">

                                            <button type="submit" class="btn btn-default btn-xs removeButton">
                                                <span class="glyphicon glyphicon-trash"></span> Delete
                                            </button> 
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- END CONTENT -->
@stop



