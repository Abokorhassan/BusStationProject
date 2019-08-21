@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Accident
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
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
      <!--section starts-->
      <h1>Accident</h1>
      <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                          data-c="#000" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#">Accident</a>
        </li>
        <li class="active">Add Accident</li>
      </ol>
    </section>
    <!--section ends-->

    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Add Accident
                </h3>
                <span class="pull-right clickable">
                  <i class="glyphicon glyphicon-chevron-up">
                  </i>
                </span>
              </div>
              <div class="panel-body">
                <!--main content-->
                <form id="commentForm" action="{{ route('admin.accident.store') }}"
                      method="POST" class="form-horizontal">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      <div id="rootwizard">
                        <h2 class="hidden">&nbsp;</h2>                 
    
                        <div class="form-group {{ $errors->first('station', 'has-error') }}">
                          <label for="station" class="col-sm-2 control-label">Station *
                          </label>
                          <div class="col-sm-10">
                            <select class="form-control" title="Select Station..." id="station" name="station">                                         
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

                        <div class="form-group {{ $errors->first('route', 'has-error') }}">
                            <label for="route" class="col-sm-2 control-label">Station *
                            </label>
                            <div class="col-sm-10">
                              <select class="form-control" title="Select Route..." id="route" name="route">                                         
                                <option value="">Select Route
                                </option>
      
                                @foreach ($routes as $route)
                                <option value="{{ $route->id}}" 
                                  @if (old('route')=== "{{$route->id}}") selected="selected"@endif
                                  >{{ $route->name}}
                                </option>
                                @endforeach
                              </select>
                              {!! $errors->first('route', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>   
                          </div> 
                        
                        <div class="form-group {{ $errors->first('bus_number', 'has-error') }}">
                          <label for="bus_number" class="col-sm-2 control-label">Bus *
                          </label>
                          <div class="col-sm-10">
                            <select class="form-control" title="Select Pas..." id="bus" name="bus_number">                                         
                              {{-- <option value="">Select bus_number
                              </option>
                              @foreach ($buses as $bus)
                              <option value="{{ $bus->id}}" 
                                @if (old('bus_number')=== "{{$bus->id}}") selected="selected"@endif
                                >{{ $bus->bus_number}}
                              </option>
                              @endforeach --}}
                            </select>
                            {!! $errors->first('bus_number', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>   
                        </div>

                        <div class="form-group {{ $errors->first('accident_latitude', 'has-error') }}">
                          <label for="accident_latitude" class="col-sm-2 control-label">Latitude *
                          </label>
                          <div class="col-sm-10">
                            <input id="accident_latitude" name="accident_latitude" type="text" placeholder="Latitude"
                                    class="form-control required" value="{!! old('accident_latitude') !!}"/>
                            {!! $errors->first('accident_latitude', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('accident_longitude', 'has-error') }}">
                          <label for="accident_longitude" class="col-sm-2 control-label">Longitude *
                          </label>
                          <div class="col-sm-10">
                            <input id="accident_longitude" name="accident_longitude" placeholder="Longitude" type="text"
                                    class="form-control required email" value="{!! old('accident_longitude') !!}"/>
                            {!! $errors->first('accident_longitude', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div> 
                        
                        {{-- <div class="form-group {{ $errors->first('route_id', 'has-error') }}">
                          <label for="route_id" class="col-sm-2 control-label">Route Id *
                          </label>
                          <div class="col-sm-10">
                            <input id="user_id" name="route_id" placeholder="Route Id" type="text"
                                    class="form-control required " value="{!! old('route_id') !!}"/>
                            {!! $errors->first('route_id', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div> --}}

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                              <a href="{{ route('admin.accident.index') }}">
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

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
      $(document).ready(function(){
        $(document).on('change','#station',function(){
          var id=$(this).val();
          console.log(id);
  
          if(id) {
                  $.ajax({
                      url: "{{ route('admin.accident.getBusesStation') }}",
                      type: "GET",
                      data:{'id':id},
                      dataType: "json",
                      success:function(data) {
                          // var bus = data[2].bus_number;
                          console.log(data);
  
                          $('select[name="bus_number"]').empty();
                          $.each( data, function( index, object ) {
                            $('select[name="bus_number"]').append('<option value="'+ object['id'] +'" >'+ object['bus_number'] +'</option>');
                          });
                      }
                  });
              }else{
                  $('select[name="bus_number"]').empty();
              }
        });
      });
    </script>
  
    <script>
      $("#station").select2({
        placeholder:'select station', allowClear:true
      });
  
      $("#bus").select2({
        placeholder:'select driver', allowClear:true
      });
    </script>

@stop