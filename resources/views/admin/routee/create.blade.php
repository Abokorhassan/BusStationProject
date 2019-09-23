@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Add Route
@stop

{{-- page level styles --}}
@section('header_styles')
  <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet"/>
  <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
  <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
  <!--end of page level css-->
  <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">

  <style>
    #map {
      height: 390px;
      width: 99%;
      margin-left: 0.3em;
    }
    #map_margin{
      margin-left: 12em;
    }
  </style>

@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
      <!--section starts-->
      <h1>Route</h1>
      <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                          data-c="#000" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#">Route</a>
        </li>
        <li class="active">Add New Route</li>
      </ol>
    </section>
    <!--section ends-->

    <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                      Add Station Route
                    </h3>
                    <span class="pull-right clickable">
                      <i class="glyphicon glyphicon-chevron-up">
                      </i>
                    </span>
                  </div>
                  <div class="panel-body">
                    <!--main content-->
                    <form id="commentForm" action="{{ route('admin.route.store') }}"
                          method="POST" class="form-horizontal"  id="form">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                          <div id="rootwizard">
                            <h2 class="hidden">&nbsp;</h2>

                            <div class="form-group {{ $errors->first('name', 'has-error') }}">
                              <label  for="name" class="col-sm-2 control-label">Name *
                              </label>
                              <div class="col-sm-10">
                                <input id="name" name="name" type="text"
                                        placeholder="Name" class="form-control required"
                                        value="{!! old('name') !!}"/>
                                {!! $errors->first('name', '
                                <span class="help-block">:message
                                </span>') !!}
                              </div>
                            </div>

                            <div class="form-group {{ $errors->first('station', 'has-error') }}">
                              <label for="station" class="col-sm-2 control-label">Station *
                              </label>
                              <div class="col-sm-10">
                                <select class="form-control" id="station" name="station">                                         
                                  <option value="">Select Station
                                  </option>
    
                                  @foreach ($stations as $station)
                                    <option value="{{ $station->id}}" 
                                      @if (old('station')=== "{{$station->id}}") selected="selected"@endif
                                      >{{ $station->name}}
                                    </option>
                                  @endforeach
                                </select>
                                {!! $errors->first('station', '
                                <span class="help-block">:message
                                </span>') !!}
                              </div>   
                            </div>

                            <div  class="form-group {{ $errors->first('path', 'has-error') }}">
                              <label for="name" class="col-sm-2 control-label">Path *
                              </label>
                              <div class="col-sm-10">
                                <input id="path" name="path" type="hidden"
                                    placeholder="Path of the route"  class="form-control required"
                                    value="{!! old('path') !!}"/>
                                  {!! $errors->first('path', '
                                  <span class="help-block">:message
                                  </span>') !!}
                                <div id="map"></div>
                              </div>
                            </div>
                            
                            <br>

                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                                <a href="{{ route('admin.route.index') }}">
                                    <button type="button" class="btn btn-danger">
                                      Cancel 
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-success">
                                    @lang('button.save')
                                </button>
                              </div>
                            </div>

                          </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        <!--row end-->
    </section>
 
@stop


{{-- page level scripts --}}
@section('footer_scripts')

    <!-- begining of page level js -->
    <!--edit blog-->
    <script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    {{--<script src="{{ asset('assets/vendors/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript"></script>--}}
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/pages/add_newblog.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/adduser.js') }}"></script>
   

    {{----------            Map Script     ------------}}

      <script>
        // counter for online buses...
        var buses_count = 0;
        // markers array to store all the markers, so that we could remove marker when any bus goes offline and its data will be remove from realtime database...
        var markers = [];
        var map;
        function initMap() { // Google Map Initialization... 
          map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 9.562389, lng:  44.077011},
            zoom: 14,
            mapTypeId: 'terrain'
          });

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

          var path = new google.maps.MVCArray();
          var polyline = new google.maps.Polyline({
            path:  path,
            geodesic: true,
            strokeColor: '#FF0000',
            strokeOpacity: 1.0,
            strokeWeight: 5
          });
          polyline.setMap(map);

          google.maps.event.addListener(map, 'click', function(e){
            currentPath = polyline.getPath();
            currentPath.push(e.latLng);
            encodeString = google.maps.geometry.encoding.encodePath(currentPath);
            document.getElementById("path").value = encodeString;
          });
        }

          
      </script>
      
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9cFPJpgNFZ5otplq5Wu7jSJer0WTbG2w&libraries=geometry&callback=initMap" 
          async defer>
      </script>

    {{----------            End Map Script     ------------}}

    <script>
      $("#station").select2({
        placeholder:'select station', allowClear:true
      });
    </script>

@stop