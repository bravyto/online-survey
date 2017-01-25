@extends('admin.layout.default')

@section('content')
    <!-- BEGIN PAGE LEVEL SCRIPT -->
    <script type="text/javascript">
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    
                    $(wrapper).append('<div><div class="form-group"><label class="col-md-3 control-label"></label><div class="col-md-4 input-icon"><i class="fa fa-user"></i><input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Group Code" name="codename[]"/></div><button class="btn btn-danger btn-sm remove_field">Delete</button></div><div class="form-group"><label class="col-md-3 control-label"></label><div class="col-md-4 input-icon"><i class="fa fa-info"></i><input class="form-control placeholder-no-fix" type="number" min="1" autocomplete="off" placeholder="Number Of Respondent" name="jumlah[]"/></div></div></div>'); //add input box
                    x++; //text box increment
                }
            });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text

                e.preventDefault();
                var mayBeRemoved = $(this).parent('div').parent('div');

                if(x==1){

                    e.preventDefault();
                    swal("Can't delete!", "You need at least one group to start survey!", "error");
                }

                else{

                    swal({   

                        title: "Are you sure?",   
                        text: "You will not be able to recover this group!",   
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Yes, delete it!",   
                        closeOnConfirm: false 
                    }, 

                    function(){  

                        x--; 
                        mayBeRemoved.remove();  
                        swal("Deleted!", "This group has been deleted.", "success");    
                    });

                }
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
                        Start Survey
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <div class="portlet-body form">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input<br><br>
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif

                    <!-- BEGIN FORM-->
                    <form action="{{ url('admin/pages/start-survey') }}" class="form-horizontal" id="startSurvey" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="form-body">
            
                            <input type="" class="hidden" placeholder="" value="" name="id">

                            <div class="form-group"> 
                                <label class="col-md-3 control-label">Nama Survey</label>
                                <div class="col-md-4 input-icon">
                                    <i class="fa fa-info"></i>
                                    <input type="text" class="form-control" placeholder="" value="" name="nama">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Deskripsi Umum</label>
                                <div class="col-md-6">
                                    <textarea rows="7" col="" type="text" class="form-control" name="deskripsi"></textarea>
                                </div>
                            </div>

                            <label class="col-md-3 control-label">Set Group</label>
                            <br>
                            <br>

                            <div class="input_fields_wrap">
                                <div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-4 input-icon">
                                        <i class="fa fa-user"></i>
                                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Group Code" name="codename[]"/>
                                    </div>
                                    <button class="btn btn-danger btn-sm remove_field">Delete</button>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-4 input-icon">
                                            <i class="fa fa-info"></i>
                                            <input class="form-control placeholder-no-fix" type="number" min="1" autocomplete="off" placeholder="Number Of Respondent" name="jumlah[]"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                <div class="table-toolbar">
                                    <div class="btn-group">
                                        <button id="sample_editable_1_new" class="btn btn-success add_field_button">
                                        Add Group <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                </div>
                            </div>

                            </div>
                        </div>
                        
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" onclick="location.href = '{{ url('admin/pages/layanan') }}';" class="btn btn-default">Cancel</button>
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



