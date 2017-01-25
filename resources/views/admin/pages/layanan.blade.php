@extends('admin.layout.default')

@section('content')
    <!-- BEGIN PAGE LEVEL SCRIPT -->

    <script type="text/javascript">
        $(document).ready(function() {
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var curID = 0;        
            
            $(wrapper).on("click",".removeButton", function(e){ //user click on remove text

                e.preventDefault();
                curID = $(this).parent().find("input[name='counter']").val();
                
                swal({   

                    title: "Are you sure?",   
                    text: "You will not be able to recover this service!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, delete it!",   
                    closeOnConfirm: false 
                }, 

                function(){  

                    swal({

                    title: "Deleted!",   
                    text: "This service has been deleted.",   
                    type: "success",   
                    confirmButtonText: "OK"                        
                    },

                    function(){

                        document.forms["myForm_"+curID].submit();
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
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title" style="font-size:28px;">
                        Survey
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <!-- BEGIN CRUD TABLE -->
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="btn-group">
                            <button id="sample_editable_1_new" onclick="location.href = '{{ url('admin/pages/layanan-create') }}';" class="btn btn-success">
                            Add New <i class="fa fa-plus"></i>
                            </button>
                        </div>

                            <div class="btn-group">
                                <button  id="sample_editable_1_new" onclick="location.href = '{{ url('admin/pages/start-survey') }}';" class="btn btn-primary">
                                    Start Survey <i class="fa fa-file-text-o"></i>
                                </button>
                            </div>  
                    </div>
                    <div class="table-responsive">
                    <table class="table table-hover customFontSize">
                    <thead>
                    <tr>
                        <th style="font-size:16px;">
                            Sub-Survey
                        </th style="font-size:16px;">
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listLayanan as $index => $layanann)
                    <tr>
                        <td>
                             {{ $listLayananName[$index] }}
                        </td>
                        <td>
                            <form action="{{ url('admin/pages/layanan-delete') }}" method="post" id="myForm_{{ $index }}" class="input_fields_wrap">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input class="hidden" type="" autocomplete="off" placeholder="" name="counter" value="{{ $index }}">
                                <input class="hidden" type="" autocomplete="off" placeholder="" name="id" value="{{ $layanann }}">
                                <button type="submit" formaction="{{ url('admin/pages/layanan') }}" class="btn btn-default btn-xs" style=""><i class="fa fa-edit"></i> Details</button>
                                <button type="submit" class="btn btn-default btn-xs removeButton" style=""><span class="glyphicon glyphicon-trash"></span> Delete</button>
                            </form>
                        </td>
                        <td>

                        </td>
                    </tr>    
                    @endforeach
                    </tbody>
                    </table>
                    </div>   
                </div>
                <!-- END CRUD TABLE -->
            </div>
        </div>
</div>
    <!-- END CONTENT -->
@stop



