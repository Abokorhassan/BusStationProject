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

        #map {
          height: 500px;
          width: 99%;
          margin-left: 0.3em;
        }
        #over_map {
            position: absolute;
            top: 7em;
            left: 87%;
            z-index: 99;
            background-color: #ccffcc;
            padding: 10px;
        }
        .circle_created {
            height: 40px;
            width: 40px;
            background-color: #038482;
            border-radius: 50%;
            display: inline-block;
            margin-top: 0.5em;
            margin-left: 1.0em;
        }
        .circle_Deleted {
            height: 40px;
            width: 40px;
            background-color: #E86D6A;
            border-radius: 50%;
            display: inline-block;
            margin-top: 0.5em;
            margin-left: 1.0em;
        }
        .circle_accident_created {
            height: 40px;
            width: 40px;
            background-color: #edbab4;
            border-radius: 50%;
            display: inline-block;
            margin-top: 0.5em;
            margin-left: 1.0em;
        }
        #myList li{
            background: #bbbec4;
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

        <div class="row" >

            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig animate_rtl">
                <!-- Trans label pie charts strats here-->
                <div class="widget-1">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right animate_rtl">
                                    <span>Stations
                                    </span>
                                    <div class="number" id="myTargetElement2">
                                    </div>
                                </div>
                                <span class="widget_circle2 pull-right animate_rtl">
                                        <i  class="livicon" data-name="sitemap"
                                            data-size="40" data-c="#f4425f" data-hc="#fff" data-loop="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig animate_rtl">
                <!-- Trans label pie charts strats here-->
                <div class="widget-1">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right animate_rtl">
                                    <span>Users
                                    </span>
                                    <div class="number" id="myTargetElement4">
                                    </div>
                                </div>
                                <span class="widget_circle4 pull-right animate_rtl">
                                    <i class="livicon livicon-evo-holder " data-name="user" data-l="true" data-c="#F89A14"
                                        data-hc="#F89A14" data-s="40">
                                    </i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig animate_rtl">
                <!-- Trans label pie charts strats here-->
                <div class="widget-1">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right animate_rtl">
                                    <span>Buses
                                    </span>
                                    <div class="number" id="myTargetElement1">
                                    </div>
                                </div>
                                <span class="widget_circle1 pull-right animate_rtl">
                                    {{-- <i class="livicon livicon-evo-holder " data-name="flag" data-l="true" data-c="#e9573f"
                                        data-hc="#e9573f" data-s="40">
                                    </i> --}}
                                    <img  src="https://img.icons8.com/color/44/000000/bus.png">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig animate_rtl">
                <!-- Trans label pie charts strats here-->
                <div class="widget-1">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right animate_rtl">
                                    <span>Drivers
                                    </span>
                                    <div class="number" id="myTargetElement3">
                                    </div>
                                </div>
                                <span class="widget_circle3 pull-right animate_rtl">
                                        <img  src="https://img.icons8.com/color/44/000000/driver.png">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--/row-->
        <div   class="row"  >
            <div  class="col-md-8 col-sm-7 no_padding animate_rtl">
                <div class="row"  >
                    <div   class="col-md-12" >
                        <div  style="height: 15em; overflow: auto"  class="panel panel-border map">
                            <div style="background: #515763; color: white" class="panel-heading ">
                                <h3  class="panel-title">
                                    <i  class="livicon" data-name="barchart" data-size="16" data-loop="true" data-c="#EF6F6C" data-hc="#EF6F6C">
                                    </i> Stations Queues
                                </h3>
                            </div>
                            <div  class="panel-body nopadmar">
                                <ul  class="nav nav-pills ">
                                    @foreach ($stations as $index => $station)
                                        <li style="font-size: 14.9px;" @if($index== 0) class="active" @endif>
                                            <a id="li" href="{{ $station->id }}" data-toggle="pill">
                                                {!! $station->name !!}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <hr  class="line">
                                <div style="margin-top: -2%"  class="tab-content">
                                    
                                </div>     
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-md-6 animate_rtl">
                        <div class="panel panel-border roles_chart">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#F89A14"
                                    data-hc="#F89A14">
                                </i>
                                User Roles
                            </h4>
                            </div>
                            <div class="panel-body nopadmar">
                            {!! $user_roles->html() !!}
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-6 animate_rtl">
                        <div class="panel panel-border">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="barchart" data-size="16" data-loop="true" data-c="#67C5DF"
                                    data-hc="#67C5DF">
                                </i>
                                Yearly visitors
                            </h4>
                            </div>
                            <div class="panel-body nopadmar">
                            <div id="bar_chart">
                            </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 animate_rtl">
                <div style="height: 15em; overflow: auto"  class="panel panel-border">
                    <div style="background: #515763; color: white" class="panel-heading border-light">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="users" data-size="18" data-color="#00bc8c" data-hc="#00bc8c"
                                data-l="true">
                            </i>
                            Recent Users
                        </h3>
                    </div>
                    <div class="panel-body nopadmar users">
                        @foreach($users as $user )
                            <div class="media">
                                <div class="media-left">
                                @if($user->pic)
                                <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" class="media-object img-circle" >
                                @else
                                <img src="{{ asset('assets/images/authors/no_avatar.jpg') }}" class="media-object img-circle" >
                                @endif
                                </div>
                                <div class="media-body">
                                <h5 class="media-heading">{{ $user->full_name }}
                                </h5>
                                <p>{{ $user->email }}  
                                    <span class="user_create_date pull-right">{{ $user->created_at->format('d M') }} 
                                    </span>
                                </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- <div class="panel panel-border">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="livicon" data-name="eye-open" data-size="16" data-loop="true" data-c="#EF6F6C"
                                data-hc="#EF6F6C">
                            </i>
                            This week visitors
                        </h4>
                    </div>

                    <div class="panel-body nopadmar">
                    <div id="visitors_chart">
                    </div>
                    </div>
                </div>

                <div class="panel panel-border">
                    <div class="panel-heading border-light">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="pen" data-size="16" data-color="#00bc8c" data-hc="#00bc8c"
                                data-l="true">
                            </i>
                            Recent Blogs
                        </h3>
                    </div>
                    <div class="panel-body nopadmar blogs">
                        @foreach($blogs as $blog )
                            <div class="media">
                                <div class="media-left">
                                    @if($blog->author->pic)
                                    <img src="{!! url('/').'/uploads/users/'.$blog->author->pic !!}" class="media-object img-circle" >
                                    @else
                                    <img src="{{ asset('assets/images/authors/no_avatar.jpg') }}" class="media-object img-circle" >
                                    @endif
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{ $blog->title }}
                                    </h5>
                                    <p>category:  {{ $blog->category->title }} 
                                        <span class="user_create_date pull-right">by  {{ $blog->author->full_name }} 
                                        </span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>

        {{-- Online Buses --}}
        <div class="col-md-12 ">
            <div class="panel panel-border map">
                <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="map" data-size="16" data-loop="true" data-c="#515763"
                        data-hc="#515763">
                    </i>
                    Online Buses
                </h3>
                </div>
                <div class="panel-body nopadmar">

                    <div id="map"></div>
                    <div id="over_map">
                        <div>
                            <span>Online Buses: </span><span id="cars">0</span>
                        </div>
                    </div>

                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d33048.757857402015!2d44.06414886069395!3d9.555171203219142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sso!4v1566030992036!5m2!1sen!2sso" 
                    width="99%" style="margin-left: 0.3em" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div> --}}
            </div>
        </div>

    </section>
          

    <div class="modal fade" id="editConfirmModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Alert</h4>
                </div>
                <div class="modal-body">
                    <p>You are already editing a row, you must save or cancel that row before edit/delete a new row</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/countUp_js/js/countUp.js') }}"></script>
    <script src="{{ asset('assets/vendors/morrisjs/morris.min.js') }}"></script>

    {{----------            Map Script     ------------}}
     
    <!-- jQuery CDN                I commented it because it disables all the clickes    -->   
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#config-web-app -->

    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyBfSDMPSQtF9AVgu6M0w55-k6uTJ1YRfyg",
            authDomain: "bsproject-251005.firebaseapp.com",
            databaseURL: "https://bsproject-251005.firebaseio.com",
            projectId: "bsproject-251005",
            storageBucket: "",
            messagingSenderId: "676642236343",
            appId: "1:676642236343:web:9960edb7f8d1259adaea32"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>

 

    <script>
        // counter for online cars...
        var cars_count = 0;
        // markers array to store all the markers, so that we could remove marker when any car goes offline and its data will be remove from realtime database...
        var markers = [];
        var map;
        function initMap() { // Google Map Initialization... 
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 9.562389, lng:  44.077011},
                zoom: 14,
                mapTypeId: 'terrain'
            });

            // var stations = {!! json_encode($stations->toArray()) !!};
            var stations = {!! json_encode($Mapstations->toArray(), JSON_HEX_TAG) !!};
            stations.forEach(myFunction);

            function myFunction(item, index) {
                var latitude = parseFloat(item.lat);
                var longitude = parseFloat(item.long);
                var LatLng = {lat: latitude, lng: longitude};

                var marker = new google.maps.Marker({
                    position: LatLng,
                    icon: "{{URL::asset('assets/img/bus_station.png')}}/",
                    map: map,
                    title: item.name
                });            
            }

        }

        // This Function will create a car icon with angle and add/display that marker on the map
        function AddCar(data) {
            // var icon = { // car icon
            //     path: 'M29.395,0H17.636c-3.117,0-5.643,3.467-5.643,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759   c3.116,0,5.644-2.527,5.644-5.644V6.584C35.037,3.467,32.511,0,29.395,0z M34.05,14.188v11.665l-2.729,0.351v-4.806L34.05,14.188z    M32.618,10.773c-1.016,3.9-2.219,8.51-2.219,8.51H16.631l-2.222-8.51C14.41,10.773,23.293,7.755,32.618,10.773z M15.741,21.713   v4.492l-2.73-0.349V14.502L15.741,21.713z M13.011,37.938V27.579l2.73,0.343v8.196L13.011,37.938z M14.568,40.882l2.218-3.336   h13.771l2.219,3.336H14.568z M31.321,35.805v-7.872l2.729-0.355v10.048L31.321,35.805',
            //     scale: 0.4,
            //     fillColor: "#427af4", //<-- Car Color, you can change it 
            //     fillOpacity: 1,
            //     strokeWeight: 1,
            //     anchor: new google.maps.Point(0, 5),
            //     rotation: data.val().angle //<-- Car angle
            // };
            var uluru = { lat: parseFloat(data.val().lat), lng: parseFloat(data.val().lng) };
            var marker = new google.maps.Marker({
                position: uluru,
                icon: "{{URL::asset('assets/img/bus_icon.png')}}/",
                map: map
            });
            console.log(data.val().lat);
            markers[data.key] = marker; // add marker in the markers array...
            document.getElementById("cars").innerHTML = cars_count;
        }

        // get firebase database reference...
        var cars_Ref = firebase.database().ref('/online_drivers/');
        // this event will be triggered when a new object will be added in the database...
        cars_Ref.on('child_added', function (data) {
            cars_count++;
            AddCar(data);
        });

        // this event will be triggered on location change of any car...
        cars_Ref.on('child_changed', function (data) {
            markers[data.key].setMap(null);
            AddCar(data);
        });

        // If any car goes offline then this event will get triggered and we'll remove the marker of that car...  
        cars_Ref.on('child_removed', function (data) {
            markers[data.key].setMap(null);
            cars_count--;
            document.getElementById("cars").innerHTML = cars_count;
        });

    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9cFPJpgNFZ5otplq5Wu7jSJer0WTbG2w&callback=initMap" 
        async defer>
    </script>

    {{----------            End Map Script     ------------}}

    <script>

        $('#markAsRead').click(function () { 
           $.get("{{ route('admin.markAsRead') }}"); 
        });

        function markNotificationAsRead(){
            alert('fuck you');   
        }
        
        var useOnComplete = false,
            useEasing = false,
            useGrouping = false,
        options = {
            useEasing: useEasing, // toggle easing
            useGrouping: useGrouping, // 1,000,000 vs 1000000
            separator: ',', // character to use as a separator
            decimal: '.' // character to use as a decimal
        };
        // var demo = new CountUp("myTargetElement1", 12.52, {{ $pageVisits }}, 0, 6, options);
        // demo.start();
        // var demo = new CountUp("myTargetElement2", 1, {{ $blog_count }}, 0, 6, options);
        // demo.start();
        // var demo = new CountUp("myTargetElement3", 24.02, {{ $visitors }}, 0, 6, options);
        // demo.start();
        var demo = new CountUp("myTargetElement4", 125, {{ $user_count }}, 0, 6, options);
        demo.start();

        var demo = new CountUp("myTargetElement1", 125, {{ $bus_count }}, 0, 6, options);
        demo.start();

        var demo = new CountUp("myTargetElement2", 125, {{ $station_count }}, 0, 6, options);
        demo.start();

        var demo = new CountUp("myTargetElement3", 125, {{ $driver_count }}, 0, 6, options);
        demo.start();

        $('.blogs').slimScroll({
            color: '#A9B6BC',
            height: 350 + 'px',
            size: '5px'
        });

        var week_data = {!! $month_visits !!};
        var year_data = {!! $year_visits !!};

        function lineChart() {
            Morris.Line({
                element: 'visitors_chart',
                data: week_data,
                lineColors: ['#418BCA', '#00bc8c', '#EF6F6C'],
                xkey: 'date',
                ykeys: ['pageViews', 'visitors'],
                labels: ['pageViews', 'visitors'],
                pointSize: 0,
                lineWidth: 2,
                resize: true,
                fillOpacity: 1,
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                hideHover: 'auto'

            });
        }
        function barChart() {
            Morris.Bar({
                element: 'bar_chart',
                data: year_data.length ? year_data :   [ { label:"No Data", value:100 } ],
                barColors: ['#418BCA', '#00bc8c'],
                xkey: 'date',
                ykeys: ['pageViews', 'visitors'],
                labels: ['pageViews', 'visitors'],
                pointSize: 0,
                lineWidth: 2,
                resize: true,
                fillOpacity: 0.4,
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                hideHover: 'auto'

            });
        }
        lineChart();
        barChart();
        $(".sidebar-toggle").on("click",function () {
            setTimeout(function () {
                $('#visitors_chart').empty();
                $('#bar_chart').empty();
                lineChart();
                barChart();
            },10);
        });
    </script>

    {!! Charts::scripts() !!}
    {!! $db_chart->script() !!}
    {!! $geo->script() !!}
    {!! $user_roles->script() !!}
    {{--{!! $line_chart->script() !!}--}}
    
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
                        url: "{{ route('admin.getRoute') }}",
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
                                    $(".tab-content").append('<ul id="myList"><li id="hva" class="list-group-item"> <a id="hva" style="font-size: 15px; "  href="{{ URL::to('admin/routeQueue/') }}/'+ object['id'] +'"> Route: <strong>'+ object['name'] +'</strong></a> </li></ul></div>');
                                });
                            }else{
                                console.log('empty');
                                $(".tab-content").empty();
                                $(".tab-content").append('<ul id="myList"><li id="hva" class="list-group-item"> <strong> No Route in this Station </strong> </li></ul></div>');             
                            }
                            
                        }
                    });
                }    
            });

            $("ul.nav-pills > li:first > a").trigger( "click" );
        });

    </script>
@stop