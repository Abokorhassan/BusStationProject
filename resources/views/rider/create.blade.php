@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Add Rider
@stop

{{-- page level styles --}}
@section('header_styles')
  <!--page level css starts-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/blog.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
  <!--end of page level css-->
  <style>
    div.polaroid {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    #rcorners {
        border-radius: 15px;
        /* border: 2px solid; */
        /* border: 2px solid #73AD21; */
        /* padding: 20px; 
        width: 200px;
        height: 150px;   */
    }
  </style>

  {{-- Pic and Date css --}}
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
    <link href="{{ asset('assets/css/parsley.css') }}" rel="stylesheet">

@stop

{{-- breadcrumb --}}
@section('top')
    <div style="background-color: ##68d8bb" class="breadcum">
        <div  class="container">
          <ol class="breadcrumb right_float">
            <li>
              <a href="{{ route('home') }}"> 
                <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d">
                </i>Dashboard
              </a>
            </li>
            <li class="hidden-xs">
              <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c">
              </i>
              <a href="#">Rdier
              </a>
            </li>
            <li class="hidden-xs">
              <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c">
              </i>
              <a href="#">Add Rider
              </a>
            </li>
          </ol>
        </div>
    </div>  
@stop

{{-- Page content --}}
@section('content')
    <!-- Container Section Strat -->
    <div class="container">
        <h2> Add New Rider
        </h2>
        <hr>
        <div class="row margin_right_left">
          <div class="row margin_right_left">
            <div class="col-md-12">
              <!--main content-->
              <div class="position-center">
                <div class="row">
                  <div class="col-sm-8">
                    <form id="commentForm" action="{{ route('user.rider.store') }}"
                          method="POST" enctype="multipart/form-data" class="form-horizontal">
                      <!-- CSRF Token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                      <div class="row">
                        <div class="col-sm-8 animate_rt">
                          <div class="form-group {{ $errors->first('rider_number', 'has-error') }}">
                              <label style="margin-top: -3%" for="rider_number" class="col-sm-2 control-label">
                                <strong>Rider Number*</strong> 
                              </label>
                              <div class="col-sm-10">
                                <input id="rider_number" name="rider_number" placeholder="Ex. Rd_01" type="text"
                                        class="form-control required" value="{!! old('rider_number') !!}"/>
                                {!! $errors->first('rider_number', '
                                <span class="help-block">:message
                                </span>') !!}
                              </div>
                          </div>

                          <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                            <label style="margin-top: -1%" for="first_name" class="col-sm-2 control-label">
                                <strong>First Name*</strong>
                            </label>
                            <div class="col-sm-10">
                              <input id="first_name" name="first_name" type="text"
                                      placeholder="First name" class="form-control required"
                                      value="{!! old('first_name') !!}"/>
                              {!! $errors->first('first_name', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                          </div>
                          
                          <div class="form-group {{ $errors->first('second_name', 'has-error') }}">
                            <label style="margin-top: -2%" for="second_name" class="col-sm-2 control-label">
                                <strong>Second Name *</strong>
                            </label>
                            <div class="col-sm-10">
                              <input id="second_name" name="second_name" type="text" placeholder="Second Name"
                                      class="form-control required" value="{!! old('second_name') !!}"/>
                              {!! $errors->first('second_name', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                          </div>

                          <div class="form-group {{ $errors->first('third_name', 'has-error') }}">
                            <label style="margin-top: -1%" for="third_name" class="col-sm-2 control-label">
                                <strong>Third Name *</strong>
                            </label>
                            <div class="col-sm-10">
                              <input  id="third_name" name="third_name" placeholder="third name" type="text"
                                      class="form-control required " value="{!! old('third_name') !!}"/>
                              {!! $errors->first('third_name', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                          </div>
            

                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                                <a href="{{ route('user.rider.index') }}">
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
                        <div class="col-sm-4 animate_rt">                           
                          <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                            <label style="margin-left: 3%" for="gender" class="col-sm-2 control-label">
                                <strong>Gender*</strong>
                            </label>
                            <div  class="col-sm-10">
                              <select  class="form-control" title="Select Gender..." name="gender">
                                <option value="">Select
                                </option>
                                <option value="male"
                                        @if(old('gender') === 'male') selected="selected" @endif >Male
                                </option>
                                <option value="female"
                                        @if(old('gender') === 'female') selected="selected" @endif >
                                  Female
                                </option>
                              </select>
                              {!! $errors->first('gender', '
                                    <span class="help-block">:message
                                    </span>') !!}
                            </div>
                          </div>  

                          <div class="form-group {{ $errors->first('ph_number', 'has-error') }}">
                            <label style="margin-left: 3%" for="ph_number" class="col-sm-2 control-label">
                                <strong>Phone No.*</strong>
                            </label>
                            <div class="col-sm-10">
                              <input id="ph_number" name="ph_number" placeholder="Ex. 063---" type="text"
                                      class="form-control required" value="{!! old('ph_number') !!}"/>
                              {!! $errors->first('ph_number', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                          </div>                      

                          {{-- <div class="form-group {{ $errors->first('bus_number', 'has-error') }}">
                            <label style="margin-top: -2%" for="bus_number" class="col-sm-2 control-label">Bus No.*
                            </label>
                            <div class="col-sm-10">
                              <select class="form-control" title="Select Pas..." name="bus_number">                                         
                                <option value="">Select bus_number
                                </option>
                                @foreach ($buses as $bus)
                                <option value="{{ $bus->id}}" 
                                  @if (old('bus_number')=== "{{$bus->id}}") selected="selected"@endif
                                  >{{ $bus->bus_number}}
                                </option>
                                @endforeach
                              </select>
                              {!! $errors->first('bus_number', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>   
                          </div>

                          <div class="form-group {{ $errors->first('station', 'has-error') }}">
                            <label for="station" class="col-sm-2 control-label">Station*
                            </label>
                            <div class="col-sm-10">
                              <select class="form-control" title="Select Station..." name="station">                                         
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
                          </div> --}}

                        </div>    
                      </div>

                    </form>{{--{!!  Form::close()  !!}--}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
      
@stop 

{{-- page level scripts --}}
@section('footer_scripts')
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  {{-- PIC AND DATA SCRIPT --}}
  <script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
  {{--<script src="{{ asset('assets/vendors/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript"></script>--}}
  <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
  <script src="{{ asset('assets/js/pages/add_newblog.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/parsley.min.js') }}" type="text/javascript"></script>

  <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
  <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
  <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
  {{-- <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script> --}}
  <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/pages/adduser.js') }}"></script>

@stop
