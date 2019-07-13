@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Edit Accident
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
    
    <!-- Pic and date Css -->
    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">


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
              <a href="#">Accident
              </a>
            </li>
            <li class="hidden-xs">
              <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c">
              </i>
              <a href="#">Edit Accident
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
        <h2> Edit Accident
        </h2>
        <hr>
        <div class="row margin_right_left">
          <div class="row margin_right_left">
            <div class="col-md-12">
              <!--main content-->
              <div class="position-center">
                <div class="row">
                  <div class="col-sm-8">
                    {!! Form::model($accident, ['url' => URL::to('accident/' . $accident->id), 'method' => 'put',
                      'class' => 'form-horizontal', 'files'=> true]) !!}

                      <!-- CSRF Token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                      <div class="form-group {{ $errors->first('bus_id', 'has-error') }}">
                        <label for="bus_id" class="col-sm-2 control-label">Bus *
                        </label>
                        <div class="col-sm-10">
                              {!! Form::select('bus_id', $opBuses, null, ['placeholder' => 'Select Bus', 'class' => 'form-control required']) !!}
                          {!! $errors->first('bus_id', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div class="form-group {{ $errors->first('accident_latitude', 'has-error') }}">
                        <label for="accident_latitude" class="col-sm-2 control-label">Latitude *
                        </label>
                        <div class="col-sm-10">
                          {!! Form::text('accident_latitude', $accident->acc_lat, array('class' => 'form-control required', 'placeholder'=>'Name')) !!}
                          {!! $errors->first('accident_latitude', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div class="form-group {{ $errors->first('accident_longitude', 'has-error') }}">
                        <label for="accident_longitude" class="col-sm-2 control-label">Longitude *
                        </label>
                        <div class="col-sm-10">
                          {!! Form::text('accident_longitude', $accident->acc_long, array('class' => 'form-control required', 'placeholder'=>'Longitude')) !!}
                          {!! $errors->first('accident_longitude', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      {{-- <div class="form-group {{ $errors->first('route_id', 'has-error') }}">
                        <label for="route_id" class="col-sm-2 control-label">Route Id *
                        </label>
                        <div class="col-sm-10">
                              {!! Form::text('route_id', null, array('class' => 'form-control required', 'placeholder'=>'Route Id')) !!}
                          {!! $errors->first('route_id', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div> --}}

                      <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                                   <a href="{{ route('user.accident.index') }}">
                                      <button type="button" class="btn btn-danger">
                                        Cancel 
                                      </button>
                                  </a>
                                  <button type="submit" class="btn btn-success">
                                      @lang('button.save')
                                  </button>
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

    {{-- Pic and Date Script --}}
    <script src="{{ asset('assets/vendors/summernote/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/add_newblog.js') }}"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/pages/add_newblog.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/parsley.min.js') }}" type="text/javascript"></script>
  
    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/adduser.js') }}"></script> 
@stop
