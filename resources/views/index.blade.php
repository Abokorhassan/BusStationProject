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
            <!-- Accordions Start -->
            <div class="text-center wow flash">
                <h3 class="border-success"><span class="heading_border bg-success">Daily Transaction</span></h3>
            </div>
            <!-- Accordions End -->
            <div class="col-md-7 col-sm-12 wow  right_float" id="tab_content" >
                <div style="text-align: center;" >
                    <h3><strong> Today's Recent Queues</strong></h3> 
                </div>  
              
                <!-- Tabbable-Panel Start -->
                <div style="height: 30em; overflow: auto" class="tabbable-panel">
                    <!-- Tabbablw-line Start -->
                    <div class="tabbable-line">
                        <!-- Nav Nav-tabs Start -->
                        <ul id="routeQueue" class="nav nav-tabs ">
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
                        <div id="queue" class="tab-content">
                            
                        </div>
                        <!-- Tab-content End -->

                    </div>
                    <!-- //Tabbablw-line End -->
                </div>
                <!-- Tabbable_panel End -->
            </div>

            <div class="col-md-5 col-sm-12 wow  right_float" id="tab_content" >
                <div style="text-align: center;" >
                    <h3><strong> Latest Schedule</strong></h3> 
                </div>  
                
                <!-- Tabbable-Panel Start -->
                <div style="height: 30em; overflow: auto" class="tabbable-panel">
                    <!-- Tabbablw-line Start -->
                    <div class="tabbable-line">
                        <!-- Nav Nav-tabs Start -->
                        <ul id="routeSchedule" class="nav nav-tabs ">
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
                        <div id="schedule" class="tab-content">
                            
                        </div>
                        <!-- Tab-content End -->

                    </div>
                    <!-- //Tabbablw-line End -->
                </div>
                <!-- Tabbable_panel End -->
            </div>
            
        </div>
        <!-- //Accordions Section End -->

    </div>
    <!-- //Container End -->
@stop
{{-- footer scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript" src="{{ asset('assets/js/frontend/jquery.circliful.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/wow/js/wow.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/index.js') }}"></script>
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

        $("ul.nav-tabs a").click(function (e) {
        e.preventDefault();  
            $(this).tab('show');
        });
        
        $("ul#routeQueue > li > a").click(function() {
            var id = $(this).attr("href").replace("#", "");
            
         
            if(id) {
                $.ajax({
                    url: "{{ route('getId') }}",
                    type: "GET",
                    data:{'id':id},
                    dataType: "json",
                    success:function(data) {
                        if(data.length > 0){
                            var count = 1;

                            $("#queue").empty();
                            $("#queue").html('<div class="tab-pane" name="queue" id="'+ id +'">')
                            $.each( data, function( index, object ) {
                                $("#queue").append('<ul id="myList" class="list-group"><li class="list-group-item"> <span class="circle_li" class="animate_rtl"><span >'
                                + count++ +'</span></span> <a id="ulroute" style="font-size: 18px;" href="{{ URL::to('/busSeat/') }}/'+ object['id'] +'" > Bus: '+ object['bus_number'] +'</a> </li></ul></div>');
                                        
                            });
                        }else{
                            $("#queue").empty();
                            $("#queue").append('<ul id="myList"><li id="hva" class="list-group-item"> <strong>Still no bus queued in this Route </strong> </li></ul></div>');             
                        }
                        
                    }
                });
            }    
        });

        $("ul#routeQueue > li:first > a").trigger( "click" );



        $("ul#routeSchedule > li > a").click(function() {
            var id = $(this).attr("href").replace("#", "");
            console.log(id);
            
         
            if(id) {
                $.ajax({
                    url: "{{ route('getSchedule') }}",
                    type: "GET",
                    data:{'id':id},
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                        if(data){
                            console.log(id);
                            console.log(data);
                            var count = 1;
                            console.log(count);

                            $("#schedule").empty();
                            $("#schedule").html('<div class="tab-pane" name="queue" id="'+ id +'">')
                                $("#schedule").append('<ul id="myList" class="list-group"><li class="list-group-item"> <a id="ulroute" style="font-size: 18px;"  > Schedule:  <strong> '+ data['schedule_number'] +'</strong></a> </li></ul></div>');
                           
                        }else{
                            console.log('empty');
                            $("#schedule").empty();
                            $("#schedule").append('<ul id="myList"><li  class="list-group-item"> <strong>Still no schedule in this Route </strong> </li></ul></div>');             
                        }
                        
                    }
                });
            }    
        });

        $("ul#routeSchedule > li:first > a").trigger( "click" );


    </script>
@stop
