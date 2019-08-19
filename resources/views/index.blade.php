@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Home
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/jquery.circliful.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl_carousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl_carousel/css/owl.theme.css') }}">
    <style>
        #myList li{
            background: #F0F0EC;
        }
        .circle_li {
            height: 30px;
            width: 30px;
            background-color: #048482;
            border-radius: 50%;
            display: inline-block;
            margin-right: 0.7em;
            margin-bottom: -0.5em;
            color: white;
            text-align: center;
            font-size: 150%;
        }
        .span_li{
            margin-bottom: 2em;
        }
    </style>

    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')
    <div style="background-color: ##68d8bb" class="breadcum">
        <div  class="container">
            <ol class="breadcrumb right_float">
            <li>
                <a href="{{ route('home') }}"> 
                <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d">
                </i>  Dashboard
                </a>
            </li>
            </ol>
        </div>
    </div>
@stop

{{-- content --}}
@section('content')

    <div id="notific">
        @include('notifications')
    </div>  

    <div style="text-align: center;" class="page-header">
        <h1 style="size: 60em" >Welcome To <Strong><span style="text-transform: uppercase;">{{ $station->name}}</span></Strong> Station</h1>      
    </div>

    <div class="container">
        <div  class="row">
            <div class="text-center">
            </div>

            <div class="col-sm-6 col-md-3 wow bounceInRight " >
                <div class="box">
                    <div class="box-icon box-icon3">
                          <img style="margin-top: 0.7em; margin-right: 0.5em; " src="https://img.icons8.com/color/60/000000/bus.png">
                    </div>
                    <div class="info">
                        <h3 id="bus" class="yellow text-center"></h3>
                       
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 wow bounceInLeft right_float" data-wow-delay="0.4s"  >
                <div class="box">
                    <div class="box-icon">
                        <img style="margin-top: 0.7em; margin-right: 0.5em;" src="https://img.icons8.com/color/60/000000/driver.png">
                    </div>
                    <div  class="info">
                        <h3 id="driver" class="success text-center".></h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 wow bounceInUp right_float" data-wow-delay="0.8s" >
                <div class="box">
                    <div class="box-icon box-icon2">
                        <i style="margin-top: 0.9em; margin-right: 0.5em; "  class="livicon livicon-evo-holder " data-name="user" data-l="true" data-c="#F89A14"
                            data-hc="#F89A14" data-s="60">
                        </i>
                    </div>
                    <div class="info">
                        <h3 id="user" class="warning text-center"></h3>
                       
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-3 wow bounceInDown right_float"  data-wow-delay="1.2s"  >
                <!-- Box Start -->
                <div class="box">
                    <div class="box-icon box-icon1">
                        <img style="margin-top: 0.6em; margin-right: 0.5em;" src="https://img.icons8.com/cotton/58/000000/route.png">
                    </div>
                    <div class="info">
                        <h3 id="route" class="primary text-center"></h3>
                       
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- //Layout Section Start -->
    <!-- Accordions Section End -->
    <div class="container">
        <div class="row">

            <div class="text-center wow flash">
                <h3 class="border-success"><span class="heading_border bg-success">Daily Transaction</span></h3>
            </div>

            <!-- From Station Queue -->
            <div class="col-md-6 col-sm-12 wow  right_float" id="tab_content" >
                <div style="text-align: center;" >
                    <h3><strong>From Station Queues</strong></h3> 
                </div>  
              
                <!-- Tabbable-Panel Start -->
                <div style="height: 30em; overflow: auto" class="tabbable-panel">
                    <!-- Tabbablw-line Start -->
                    <div class="tabbable-line">
                        <!-- Nav Nav-tabs Start -->
                        <ul id="fromStationQueues" class="nav nav-tabs ">
                            @foreach ($routes as $index => $route)
                                <li @if($index== 0) class="active" @endif>
                                    <a href="#{{ $route->id }}" id="ad{{ $route->id }}" data-toggle="tab">
                                        {!! $route->name !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- //Nav Nav-tabs End -->

                        <!-- Tab-content Start -->
                        <div id="fromqueue" class="tab-content">
                            
                        </div>
                        <!-- Tab-content End -->

                    </div>
                    <!-- //Tabbablw-line End -->
                </div>
                <!-- Tabbable_panel End -->
            </div>

            <!-- To Station Queue -->
            <div class="col-md-6 col-sm-12 wow  right_float" id="tab_content" >
                <div style="text-align: center;" >
                    <h3><strong>To Station Queues</strong></h3> 
                </div>  
                
                <!-- Tabbable-Panel Start -->
                <div style="height: 30em; overflow: auto" class="tabbable-panel">
                    <!-- Tabbablw-line Start -->
                    <div class="tabbable-line">
                        <!-- Nav Nav-tabs Start -->
                        <ul id="toStationQueues" class="nav nav-tabs ">
                            @foreach ($routes as $index => $route)
                                <li @if($index== 0) class="active" @endif>
                                    <a href="#{{ $route->id }}" id="ad{{ $route->id }}" data-toggle="tab">
                                        {!! $route->name !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- //Nav Nav-tabs End -->

                        <!-- Tab-content Start -->
                        <div id="toqueue" class="tab-content">
                            
                        </div>
                        <!-- Tab-content End -->

                    </div>
                    <!-- //Tabbablw-line End -->
                </div>
                <!-- Tabbable_panel End -->
            </div>

            <!-- From Station On Going -->
            <div class="col-md-6 col-sm-12 wow  right_float" id="tab_content" >
                <div style="text-align: center;" >
                    <h3><strong>From Station On Going Bus</strong></h3> 
                </div>  
                
                <!-- Tabbable-Panel Start -->
                <div style="height: 30em; overflow: auto" class="tabbable-panel">
                    <!-- Tabbablw-line Start -->
                    <div class="tabbable-line">
                        <!-- Nav Nav-tabs Start -->
                        <ul id="fromStationOnGoing" class="nav nav-tabs ">
                            @foreach ($routes as $index => $route)
                                <li @if($index== 0) class="active" @endif>
                                    <a href="#{{ $route->id }}" id="ad{{ $route->id }}" data-toggle="tab">
                                        {!! $route->name !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- //Nav Nav-tabs End -->

                        <!-- Tab-content Start -->
                        <div id="fromongoing" class="tab-content">
                            
                        </div>
                        <!-- Tab-content End -->

                    </div>
                    <!-- //Tabbablw-line End -->
                </div>
                <!-- Tabbable_panel End -->
            </div>

            <!-- To Station On Going -->
            <div class="col-md-6 col-sm-12 wow  right_float" id="tab_content" >
                <div style="text-align: center;" >
                    <h3><strong>To Station On Going Bus</strong></h3> 
                </div>  
                
                <!-- Tabbable-Panel Start -->
                <div style="height: 30em; overflow: auto" class="tabbable-panel">
                    <!-- Tabbablw-line Start -->
                    <div class="tabbable-line">
                        <!-- Nav Nav-tabs Start -->
                        <ul id="toStationOnGoing" class="nav nav-tabs ">
                            @foreach ($routes as $index => $route)
                                <li @if($index== 0) class="active" @endif>
                                    <a href="#{{ $route->id }}" id="ad{{ $route->id }}" data-toggle="tab">
                                        {!! $route->name !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- //Nav Nav-tabs End -->

                        <!-- Tab-content Start -->
                        <div id="toongoing" class="tab-content">
                            
                        </div>
                        <!-- Tab-content End -->

                    </div>
                    <!-- //Tabbablw-line End -->
                </div>
                <!-- Tabbable_panel End -->
            </div>
            
        </div>

    </div>

    {{-- Delete Modal --}}
    <form method="POST" id="deleteForm" >
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div  class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">
                        <strong>Full Bus</strong>
                    </h3>
                    
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <h4>You sure, this Bus is full?</h4>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button style=" border-color: #09bd8f;" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button style="color: white;" type="submit" name="" class="btn btn-primary" data-dismiss="modal" onclick="formSubmit()">Yes</button>
                </div>
                
            </div>
            </div>
        </div>
    </form>

    {{-- Finish  --}}
    <form method="POST" id="finishForm" >
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div  class="modal fade" id="finish_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">
                        <strong>Bus Finish his Turn</strong>
                    </h3>
                    
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <h4>You sure, this Bus his going turn?</h4>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button style=" border-color: #09bd8f;" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button style="color: white;" type="submit" name="" class="btn btn-primary" data-dismiss="modal" onclick="finishSubmit()">Yes</button>
                </div>
                
            </div>
            </div>
        </div>
    </form>

@stop
{{-- footer scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript" src="{{ asset('assets/js/frontend/jquery.circliful.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/wow/js/wow.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/index.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <!--page level js ends-->
    <script>
        
        // driver_count
        var text = {{$driver_count}};
        $("#driver").text(text);

        // bus_count
        var text = {{$bus_count}};
        $("#bus").text(text);

        // user_count
        var text = {{$user_count}};
        $("#user").text(text);

        // route_count
        var text = {{$route_count}};
        $("#route").text(text);


        function deleteData(id){
            var id = id;
            var url = '{{ route("home.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }
   
        function formSubmit(){
            $("#deleteForm").submit();
        }


        $("ul.nav-tabs a").click(function (e) {
        e.preventDefault();  
            $(this).tab('show');
        });
        
        // From Staion Queues
        $("ul#fromStationQueues > li > a").click(function() {
            var id = $(this).attr("href").replace("#", "");
            console.log(id);
         
            if(id) {
                $.ajax({
                    url: "{{ route('fromStationQueues') }}",
                    type: "GET",
                    data:{'id':id},
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                        if(data.length > 0){
                            var count = 1;

                            $("#fromqueue").empty();
                            $("#fromqueue").html('<div class="tab-pane" name="queue" id="'+ id +'">')
                            $.each( data, function( index, object ) {
                                $("#fromqueue").append('<ul id="myList" class="list-group"><li class="list-group-item"> <span class="circle_li" class="animate_rtl"><span >'
                                + count++ +'</span></span> <a id="ulroute" style="font-size: 18px; "  > Bus: '+ object['bus_number']
                                 +'</a> <a style="color: white; margin-left: 20em;" href="javascript:;" data-toggle="modal" onclick="deleteData('+ object['id'] +')" data-target="#delete_confirm" class="btn btn-primary"> Full  </a>  </li></ul></div>');
                                        
                            });
                        }else{
                            $("#fromqueue").empty();
                            $("#fromqueue").append('<ul id="myList" class="list-group"><li " class="list-group-item"> <strong>No bus queued in this Route </strong> </li></ul></div>');             
                        }
                        
                    }
                });
            }    
        });
        
        $("ul#fromStationQueues > li:first > a").trigger( "click" );


        // To Staion Queues
        $("ul#toStationQueues > li > a").click(function() {
            var id = $(this).attr("href").replace("#", "");
        
            
         
            if(id) {
                $.ajax({
                    url: "{{ route('toStationQueues') }}",
                    type: "GET",
                    data:{'id':id},
                    dataType: "json",
                    success:function(data) {
                   
                        if(data.length > 0){
                            var count = 1;

                            $("#toqueue").empty();
                            $("#toqueue").html('<div class="tab-pane" name="queue" id="'+ id +'">')
                            $.each( data, function( index, object ) {
                                $("#toqueue").append('<ul id="myList" class="list-group"><li class="list-group-item"> <span class="circle_li" class="animate_rtl"><span >'
                                + count++ +'</span></span> <a id="ulroute" style="font-size: 18px; "  > Bus: '+ object['bus_number']
                                 +'</a> <a style="color: white; margin-left: 20em;" href="javascript:;" data-toggle="modal" onclick="deleteData('+ object['id'] +')" data-target="#delete_confirm" class="btn btn-primary"> Full  </a>  </li></ul></div>');
                                        
                            });
                        }else{
                            $("#toqueue").empty();
                            $("#toqueue").append('<ul id="myList" class="list-group"><li " class="list-group-item"> <strong>No bus queued in this Route </strong> </li></ul></div>');   
                        }
                        
                    }
                });
            }    
        });

        $("ul#toStationQueues > li:first > a").trigger( "click" );


        // From Staion On Going Bus
        $("ul#fromStationOnGoing > li > a").click(function() {
            var id = $(this).attr("href").replace("#", "");
            
         
            if(id) {
                $.ajax({
                    url: "{{ route('fromStationOnGoingBus') }}",
                    type: "GET",
                    data:{'id':id},
                    dataType: "json",
                    success:function(data) {
                        if(data.length > 0){
                            var count = 1;

                            $("#fromongoing").empty();
                            $("#fromongoing").html('<div class="tab-pane" name="queue" id="'+ id +'">')
                            $.each( data, function( index, object ) {
                                $("#fromongoing").append('<ul id="myList" class="list-group"><li class="list-group-item"> <span class="circle_li" class="animate_rtl"><span >'
                                + count++ +'</span></span> <a id="ulroute" style="font-size: 18px; "  > Bus: '+ object['bus_number']
                                    +'</a> <a style="color: white; margin-left: 20em;" href="{{ URL::to('finish/') }}/'+ object['id'] +'" class="btn btn-primary"> Complete  </a>  </li></ul></div>');
                                //  +'</a> <a style="color: white; margin-left: 20em;" href="javascript:;" data-toggle="modal" onclick="finishBus('+ object['id'] +')" data-target="#finish_confirm" class="btn btn-primary"> Complete  </a>  </li></ul></div>');
                                //  <a id="hva" style="font-size: 15px; "  href="{{ URL::to('admin/routeQueue/') }}/'+ object['id'] +'"> Route: <strong>'+ object['name'] +'</strong></a> 
                                        
                            });
                        }else{
                            $("#fromongoing").empty();
                            $("#fromongoing").append('<ul id="myList" class="list-group"><li id="hva" class="list-group-item"> <strong>No bus Going on the route</strong> </li></ul></div>'); 
                        }
                        
                    }
                });
            }    
        });

        $("ul#fromStationOnGoing > li:first > a").trigger( "click" );


        // To Staion On Going Bus
        $("ul#toStationOnGoing > li > a").click(function() {
            var id = $(this).attr("href").replace("#", "");
        
            
         
            if(id) {
                $.ajax({
                    url: "{{ route('toStationOnGoingBus') }}",
                    type: "GET",
                    data:{'id':id},
                    dataType: "json",
                    success:function(data) {
                        if(data.length > 0){
                            var count = 1;

                            $("#toongoing").empty();
                            $("#toongoing").html('<div class="tab-pane" name="queue" id="'+ id +'">')
                            $.each( data, function( index, object ) {
                                $("#toongoing").append('<ul id="myList" class="list-group"><li class="list-group-item"> <span class="circle_li" class="animate_rtl"><span >'
                                + count++ +'</span></span> <a id="ulroute" style="font-size: 18px; "  > Bus: '+ object['bus_number']
                                    +'</a> <a style="color: white; margin-left: 20em;" href="{{ URL::to('finish/') }}/'+ object['id'] +'" class="btn btn-primary"> Complete  </a>  </li></ul></div>');
                                
                            });
                        }else{
                            $("#toongoing").empty();
                            $("#toongoing").append('<ul id="myList" class="list-group"><li id="hva" class="list-group-item"> <strong>No bus Going on the route</strong> </li></ul></div>'); 
                        }
                        
                    }
                });
            }    
        });

        $("ul#toStationOnGoing > li:first > a").trigger( "click" );


    </script>
@stop
