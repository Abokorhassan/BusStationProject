@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Bus Station Management System
@stop

{{-- page level styles --}}
@section('header_styles')


    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/>
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/morrisjs/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/dashboard2.css') }}"/>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> --}}
    <style>
        .circle_tr {
            height: 35px;
            width: 35px;
            background-color: #038482;
            border-radius: 50%;
            display: inline-block;
            color: white;            
        }
        .circle_a {
            height: 30px;
            width: 30px;
            background-color:  #515763;
            border-radius: 50%;
            display: inline-block;
            color: white;    
            margin-right: 0.6em;   
            margin-left: -0.4em;     
        }
        .reserve_seat{
            margin-left: 0.3em;
            margin-top: 2em;
            font-size: 130%;
          
        }
        .reserve_seat_a{
            margin-left: 0.5em;
            margin-top: 2em;
            font-size: 130%;
        }
        #myList li{
            background: #F0F0EC;
        }
        ul.nav-tabs > li > a{
            background: #23527C;
            color: white;
        }
        ul.nav-tabs > li > a:hover{
            background: #6f8bd6;
            color: white;
        }
        hr.line {
            border: 1px solid #3A4252;
            margin-top: -%
            
        }

        ul#myList > li:hover, ul#myList > li > a:hover{
            background: #333357;
            color: white;
        }
        #li:active{
            background: #181852;
            color: white;
        }
    </style>
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1><span class="dashboard1">Welcome to Admin Dashboard </span> </h1>

        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                    Dashboard
                </a>
            </li>
        </ol>
    </section>

    <section class="content">


        <!--/row-->
        <div   class="row"  >
            <div  class="col-md-8 col-sm-7 no_padding animate_rtl">
                <div class="row"  >
                    <div   class="col-md-12" >
                        <div  class="panel panel-border map">
                            <div style="background: #515763; color: white" class="panel-heading ">
                                <h3  class="panel-title">
                                    <i  class="livicon" data-name="barchart" data-size="16" data-loop="true" data-c="#EF6F6C" data-hc="#EF6F6C">
                                    </i> Stations Queues
                                </h3>
                            </div>
                            <div  class="panel-body nopadmar">
                                <ul  class="nav nav-pills ">
                                    <?php $count = 1; ?>
                                   @forelse ($queues as $index => $queue)
                                        <li style="font-size: 14.9px;" @if($index== 0) class="active" @endif>
                                                
                                            <a id="li" href="{{ $queue->id }}" data-toggle="pill">
                                                <span class="circle_a">
                                                    <span style="margin-bottom: -100%" class="reserve_seat_a"><?php echo $count; ?></span>
                                                </span>
                                                {!! $queue->bus_number !!}
                                            </a>
                                        </li>
                                        <?php $count++; ?>
                                   @empty
                                       
                                   @endforelse
                                </ul>
                                <hr  class="line">
                                <div style="margin-top: -2%"  class="tab-content">
                                    
                                </div>


                                  

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/countUp_js/js/countUp.js') }}"></script>
    <script src="{{ asset('assets/vendors/morrisjs/morris.min.js') }}"></script>

    <script>

        $('#markAsRead').click(function () { 
           $.get("{{ route('admin.markAsRead') }}"); 
        });
    </script>
    
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).ready(function(){
                function getQueue(id){
                    var id = id;
                    console.log(id);
                    
                }
            });

            $("ul.nav-pills > li > a").click(function() {
                var id = $(this).attr("href").replace("#", "");   
                if(id) {
                    $.ajax({
                        url: "{{ route('admin.getSeats') }}",
                        type: "GET",
                        data:{'id':id},
                        dataType: "json",
                        success:function(data) {
                            if(data.length > 0){
                                console.log(data);
                                var count = 1;

                                $(".tab-content").empty();
                                $(".tab-content").html('<div  id="'+ id +'">')
                                $.each( data, function( index, object ) {
                                    $(".tab-content").append('<ul id="myList"><li id="hva" class="list-group-item"><span class="circle_tr"><span style="margin-bottom: -140%" class="reserve_seat">'+ object['seat_number'] +'</span></span><strong style="margin-left: 1em; fontso">'+ object['rider_number'] +'</strong></li></ul></div>');
                                });
                            }else{
                                console.log('empty');
                                $(".tab-content").empty();
                                $(".tab-content").append('<ul id="myList"><li id="hva" class="list-group-item"><strong style="margin-left: 1em; fontso">No Reserve seats in this bus yet</strong></li></ul></div>');      
                            }
                            
                        }
                    });
                }    
            });

            $("ul.nav-pills > li:first > a").trigger( "click" );
        });

    </script>
@stop