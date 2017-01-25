@extends('admin.layout.default')

@section('content')

    <!-- BEGIN CONTENT -->
    <script type="text/javascript">

        $(document).ready(function() {
            
        });

//        window.onload = function(e){
//
//                swal({   
//
//                    title: "Please wait.",   
//                    text: "This page is loading...",
//                    imageUrl: "{{ asset('assets/img/pre-loader.gif') }}",   
//                    timer: 2000,
//                    showConfirmButton: false
//                }, 
//
//                function(){ 
//
//                $(this).scrollTop(0);
//
//                html2canvas($("#placeholder"), {
//                    onrendered: function(canvas) {
//                        // canvas is the final rendered <canvas> element
//                        var overall = canvas.toDataURL("image/png");
//                        var newImg = document.createElement("img"); // create img tag
//                        newImg.src = overall;
//                        newImg.style.width = '100%';
//                                        
//                        $('#respons').empty();
//                        document.getElementById('respons').appendChild(newImg); // add to end of your document
//                    }
//                });
//                
//                @foreach ($layananScore as $index => $dataLayanan)
//                
//                html2canvas($("#placeholder{{ $index }}"), {
//                    onrendered: function(canvas) {
//                        // canvas is the final rendered <canvas> element
//                        var overall = canvas.toDataURL("image/png");
//                        var newImg = document.createElement("img"); // create img tag
//                        newImg.src = overall;
//                        newImg.style.width = '100%';
//                                        
//                        var holder = document.getElementById('placeholder{{ $index }}');
//                        document.getElementById('respons{{ $index }}').removeChild(holder);
//                        document.getElementById('respons{{ $index }}').appendChild(newImg); // add to end of your document
//                    }
//                });
//                    
//                
//                @foreach ($dataLayanan['dataQuestion'] as $indexnya => $data)
//                
//                html2canvas($("#placeholder{{ $index }}_{{ $indexnya }}"), {
//                    onrendered: function(canvas) {
//                        // canvas is the final rendered <canvas> element
//                        var overall = canvas.toDataURL("image/png");
//                        var newImg = document.createElement("img"); // create img tag
//                        newImg.src = overall;
//                        newImg.style.width = '100%';
//                                        
//                        var holder = document.getElementById('placeholder{{ $index }}_{{ $indexnya }}');
//                        document.getElementById('respons{{ $index }}_{{ $indexnya }}').removeChild(holder);
//                        document.getElementById('respons{{ $index }}_{{ $indexnya }}').appendChild(newImg); // add to end of your document
//                    }
//                });
//                
//                @endforeach
//                @endforeach
//                
//        
//        
//
//                    swal({
//
//                    title: "Please wait.",   
//                    text: "This page is loading...",
//                    imageUrl: "{{ asset('assets/img/pre-loader.gif') }}",    
//                    timer: 3000,
//                    showConfirmButton: false                    
//                    }); 
//                });
//    };     

    var dataSet = [
        { label: "Sangat Memuaskan", data: {{ $overall['SM'] }}, color: "#005CDE" },
        { label: "Memuaskan", data: {{ $overall['M'] }}, color: "#00A36A" },
        { label: "Kurang Memuaskan", data: {{ $overall['KM'] }}, color: "#7D0096" },
        { label: "Tidak Memuaskan", data: {{ $overall['TM'] }}, color: "#992B00" },
        { label: "Sangat Tidak Memuaskan", data: {{ $overall['STM'] }}, color: "#DE000F" },
        { label: "NA", data: {{ $overall['NA'] }}, color: "#ED7B00" }    
    ];
        
    var dataSetLayanan = [];
    var dataSetQuestion = [];
        
    @foreach ($layananScore as $dataInput) 
        dataSetLayanan.push([
            { label: "Sangat Memuaskan", data: {{ $dataInput['data']['SM'] }}, color: "#005CDE" },
            { label: "Memuaskan", data: {{ $dataInput['data']['M'] }}, color: "#00A36A" },
            { label: "Kurang Memuaskan", data: {{ $dataInput['data']['KM'] }}, color: "#7D0096" },
            { label: "Tidak Memuaskan", data: {{ $dataInput['data']['TM'] }}, color: "#992B00" },
            { label: "Sangat Tidak Memuaskan", data: {{ $dataInput['data']['STM'] }}, color: "#DE000F" },
            { label: "NA", data: {{ $dataInput['data']['NA'] }}, color: "#ED7B00" }    
        ]);

                    
        var dataSetQuestionnya = [];
        @foreach ($dataInput['dataQuestion'] as $dataQuestion)
            dataSetQuestionnya.push([
                { label: "Sangat Memuaskan", data: {{ $dataQuestion['SM'] }}, color: "#005CDE" },
                { label: "Memuaskan", data: {{ $dataQuestion['M'] }}, color: "#00A36A" },
                { label: "Kurang Memuaskan", data: {{ $dataQuestion['KM'] }}, color: "#7D0096" },
                { label: "Tidak Memuaskan", data: {{ $dataQuestion['TM'] }}, color: "#992B00" },
                { label: "Sangat Tidak Memuaskan", data: {{ $dataQuestion['STM'] }}, color: "#DE000F" },
                { label: "NA", data: {{ $dataQuestion['NA'] }}, color: "#ED7B00" }    
            ]);
        @endforeach

        dataSetQuestion.push(dataSetQuestionnya);
        
    @endforeach

    var options = {
        series: {
            pie: {
                show: true,                
                label: {
                    show:true,
                    radius: 0.8,
                    formatter: function (label, series) {                
                        return '<div style="border:1px solid grey;font-size:8pt;text-align:center;padding:5px;color:white;">' +
                        Math.round(series.percent * 100) / 100 +
                        '%</div>';
                    },
                    background: {
                        opacity: 0.8,
                        color: '#000'
                    }
                }
            }
        }
    };

    $(document).ready(function () {
        $.plot($("#placeholder"), dataSet, options);
    });


    </script>
     <script>
        jQuery(document).ready(function() {    
            $('.collapse').on('shown.bs.collapse', function(){
                $(this).parent().find(".fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-up");
                }).on('hidden.bs.collapse', function(){
                $(this).parent().find(".fa-angle-up").removeClass("fa-angle-up").addClass("fa-angle-down");
            });
        });
    </script>
    <div class="page-content-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE-->
                        <h3 class="page-title">
                        {{ $surveyName }}
                         <div class="pull-right">
                            <a href="javascript:window.print()" type="button" class="btn btn-success hidden-print">
                                <i class="fa fa-print"></i> &nbsp; Print
                            </a>
                        </div>
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
                                    <i class="fa fa-file"></i>Description
                                </div>
                            </div>
                            <div class="portlet-body">
                                {!! $surveyDescription !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-tasks"></i>Overall Statistics
                                </div>
                            </div>
                            <div class="portlet-body" id="respons">
                                <div class="placeholder" id="placeholder" style="width:300px; height:300px;margin:0 auto;background-color:white"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="portlet">
                            <div class="portlet-title hidden-print">
                                <div class="caption">
                                    <i class="fa fa-tasks"></i>Statistics by Sub-Surveys
                                </div>
                            </div>
                            @foreach ($layananScore as $index => $dataLayanan)
                      
                            <script type="text/javascript">      
                                $(document).ready(function () {
                                    $.plot($("#placeholder{{ $index }}"), dataSetLayanan[{{ $index }}], options);
                                });
                            </script>
                            
                            
                            <div class="portlet-body">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{{ $dataLayanan['name'] }}</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="thumbnail" id="respons{{ $index }}">
                                                <div class="caption">
                                                    <h3>General Statistic</h3>
                                                    <p>
                                                         {!! $dataLayanan['description'] !!}
                                                    </p>
                                                </div>
                                                <div class="placeholder" id="placeholder{{ $index }}" style="width:300px;height:300px;margin:30px auto;background-color:white"></div>
    <script language="javascript">
    // $(document).ready(function() {
    //     html2canvas($("#placeholder{{ $index }}"), {
    //         onrendered: function(canvas) {
    //             // canvas is the final rendered <canvas> element
    //             var overall = canvas.toDataURL("image/png");
    //             var newImg = document.createElement("img"); // create img tag
    //             newImg.src = overall;
    //             newImg.style.width = '100%';
                                
    //             $('#placeholder{{ $index }}').empty();
    //             document.getElementById('placeholder{{ $index }}').appendChild(newImg); // add to end of your document
    //         }
    //     });
    // });
    </script>
                                            </div>
                                        </div>
                                        @foreach ($dataLayanan['dataQuestion'] as $indexnya => $data)
                                        <script type="text/javascript">      
                                            $(document).ready(function () {
                                                $.plot($("#placeholder{{ $index }}_{{ $indexnya }}"), dataSetQuestion[{{ $index }}][{{ $indexnya }}], options);
                                            });
                                        </script>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="thumbnail" id="respons{{$index}}_{{$indexnya}}">
                                                <div class="caption">
                                                    <h3>Pertanyaan {{ $indexnya + 1 }}</h3>
                                                    <p>
                                                         {!! $data['name'] !!}
                                                    </p>
                                                </div>
                                                <div class="placeholder" id="placeholder{{ $index }}_{{ $indexnya }}" style="width:300px;height:300px;margin:0 auto;background-color:white"></div>
                                                
                                            </div>
                                        </div>
    <script language="javascript">
    // $(document).ready(function() {
    //     html2canvas($("#placeholder{{ $index }}_{{ $indexnya }}"), {
    //         onrendered: function(canvas) {
    //             // canvas is the final rendered <canvas> element
    //             var overall = canvas.toDataURL("image/png");
    //             var newImg = document.createElement("img"); // create img tag
    //             newImg.src = overall;
    //             newImg.style.width = '100%';
                                
    //             $('#placeholder{{ $index }}_{{ $indexnya }}').empty();
    //             document.getElementById('placeholder{{ $index }}_{{ $indexnya }}').appendChild(newImg); // add to end of your document
    //         }
    //     });
    // });
    </script>
                                        @endforeach
                                        <div class="portlet-body">
                                            <div class="panel-group accordion col-sm-12 col-md-12" id="accordion1">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion1" href="#collapse_{{ $index + 1 }}">
                                                        <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_{{ $index + 1 }}">
                                                        <span class="fa fa-angle-down pull-right"></span>
                                                        Saran </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse_{{ $index + 1 }}" class="panel-collapse in">
                                                        <div class="panel-body">
                                                            <ul class="list-group">

                                                                @foreach ($dataLayanan['saran'] as $dataSaran)
                                                                <li class="list-group-item">
                                                                     {{ $dataSaran->saran }}
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->

    <script language="javascript">
        $(window).load(function(){
  //your code here
            $("#placeholder").width("75%");
            @foreach ($layananScore as $index => $dataLayanan)

                    $("#placeholder{{ $index }}").width("75%");


                    @foreach ($dataLayanan['dataQuestion'] as $indexnya => $data)

                    $("#placeholder{{ $index }}_{{ $indexnya }}").width("75%");

                    @endforeach
            @endforeach
        });
    // $(document).ready(function() {
    //     html2canvas($("#placeholder"), {
    //         onrendered: function(canvas) {
    //             // canvas is the final rendered <canvas> element
    //             var overall = canvas.toDataURL("image/png");
    //             var newImg = document.createElement("img"); // create img tag
    //             newImg.src = overall;
    //             newImg.style.width = '100%';
                                
    //             $('#placeholder').empty();
    //             document.getElementById('placeholder').appendChild(newImg); // add to end of your document
    //         }
    //     });
    // });
    </script>

@stop



