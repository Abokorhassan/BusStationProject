@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Add Driver
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
              <a href="#">Driver
              </a>
            </li>
            <li class="hidden-xs">
              <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c">
              </i>
              <a href="#">Add Driver
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
        <h2> Add New Driver
        </h2>
        <hr>
        <div class="row margin_right_left">
          <div class="row margin_right_left">
            <div class="col-md-12">
              <!--main content-->
              <div class="position-center">
                <div class="row">
                  <div class="col-sm-8">
                    <form id="commentForm" action="{{ route('user.driver.store') }}"
                          method="POST" enctype="multipart/form-data" class="form-horizontal">
                      <!-- CSRF Token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                      <div class="row">

                        <div class="col-sm-8 animate_rt">

                          <div  class="form-group {{ $errors->first('driver_number', 'has-error') }}">
                            <label  style="margin-top: -2%"  for="driver_number" class="col-sm-2 control-label">
                              <strong>Driver Number*</strong>
                            </label>
                            <div class="col-sm-10">
                              <input id="driver_number" name="driver_number" type="text" placeholder="Ex. Dr_01"
                                      class="form-control required" value="{!! old('driver_number') !!}"/>
                              {!! $errors->first('driver_number', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                          </div>

                          <div class="form-group {{ $errors->first('firstname', 'has-error') }}">
                            <label style="margin-top: -2%" for="first_name" class="col-sm-2 control-label">
                              <strong>First Name*</strong>
                            </label>
                            <div class="col-sm-10">
                              <input id="firstname" name="firstname" type="text"
                                      placeholder="First name" class="form-control required"
                                      value="{!! old('firstname') !!}"/>
                              {!! $errors->first('firstname', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                          </div>
                         
                          <div  class="form-group {{ $errors->first('second_name', 'has-error') }}">
                            <label style="margin-top: -2%"   for="second_name" class="col-sm-2 control-label">
                              <strong>Second Name*</strong> 
                            </label>
                            <div class="col-sm-10">
                              <input id="second_name" name="second_name" type="text" placeholder="Second Name"
                                      class="form-control required" value="{!! old('second_name') !!}"/>
                              {!! $errors->first('second_name', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                          </div>
  
                          <div  class="form-group {{ $errors->first('third_name', 'has-error') }}">
                            <label  style="margin-top: -2%"  for="third_name" class="col-sm-2 control-label">
                              <strong>Third Name *</strong>
                            </label>
                            <div class="col-sm-10">
                              <input id="third_name" name="third_name" type="text" placeholder="Third Name"
                                      class="form-control required" value="{!! old('third_name') !!}"/>
                              {!! $errors->first('third_name', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                          </div>
  
                          <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            <label for="email" class="col-sm-2 control-label">
                                <strong>Email *</strong>
                            </label>
                            <div class="col-sm-10">
                              <input id="email" name="email" placeholder="Email" type="text"
                                      class="form-control required email" value="{!! old('email') !!}"/>
                              {!! $errors->first('email', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                          </div>

                          <div class="form-group {{ $errors->first('license_number', 'has-error') }}">
                            <label for="license_number" class="col-sm-2 control-label">
                                <strong>License Number *</strong>
                            </label>
                            <div class="col-sm-10">
                              <input id="license_number" name="license_number" placeholder="license number" type="text"
                                      class="form-control required email" value="{!! old('license_number') !!}"/>
                              {!! $errors->first('license_number', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                          </div>

                          <div class="form-group {{ $errors->first('genders', 'has-error') }}">
                            <label for="genders" class="col-sm-2 control-label">
                                <strong>Gender</strong>*
                            </label>
                            <div  class="col-sm-10">
                              <select class="form-control" title="Select Gender..." name="genders">
                                <option value="">Select
                                </option>
                                <option value="male"
                                        @if(old('genders') === 'male') selected="selected" @endif >Male
                                </option>
                                <option value="female"
                                        @if(old('genders') === 'female') selected="selected" @endif >
                                  Female
                                </option>
                              </select>
                              {!! $errors->first('genders', '
                                    <span class="help-block">:message
                                    </span>') !!}
                            </div>
                          </div>

                          <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                                  
                                  <a href="{{ route('user.driver.index') }}">
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

                          <div class="form-group {{ $errors->first('ph_number', 'has-error') }}">
                            <label style="margin-top: -3%" for="ph_number" class="col-sm-2 control-label">
                                <strong>Phone No.*</strong>
                            </label>
                            <div class="col-sm-10">
                              <input id="ph_number" name="ph_number" placeholder="phone number" type="text"
                                      class="form-control required email" value="{!! old('ph_number') !!}"/>
                              {!! $errors->first('ph_number', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                          </div>

                          <div class="form-group">
                              <label style="margin-left: -3%" for="address" class="col-sm-2 control-label">
                                  <strong>Addrss</strong>
                              </label>
                              <div style="margin-left: 2%" class="col-sm-10">
                                <input id="address" name="address" type="text" class="form-control"
                                        value="{!! old('address') !!}"/>
                              </div>
                              <span class="help-block">{{ $errors->first('address', ':message') }}
                              </span>
                          </div>
                          <div class="form-group  {{ $errors->first('dob', 'has-error') }}">
                              <label style="margin-left: -3%" for="dob" class="col-sm-2 control-label">
                                  <strong>DOB</strong>
                              </label>
                              <div style="margin-left: 2%" class="col-sm-10">
                                <input id="dob" name="dob" type="text" class="form-control"
                                       data-date-format="YYYY-MM-DD"
                                       placeholder="yyyy-mm-dd"/>
                              </div>
                              <span class="help-block">{{ $errors->first('dob', ':message') }}
                              </span>
                          </div>
                          <div class="form-group {{ $errors->first('picture', 'has-error') }}">
                            <label class="control-label col-xs-12"></label>                         
                            <div class="col-xs-12 fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 200px;">
                                    <img src="{{ asset('assets/images/authors/no_avatar.jpg') }}" alt="..."
                                          class="img-responsive"/>
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"
                                      style="max-width: 200px; max-height: 150px;">
                                </div>
                                <div class="row">
                                  <input type="file" name="picture" class="btn btn-primary" id="pic" accept="image/*"/>
                                  <span style="margin-top: 3%" class="btn btn-danger fileinput-exists"
                                        data-dismiss="fileinput">Remove
                                  </span>
                                </div>
                                <span class="help-block">{{ $errors->first('picture', ':message') }}</span>
                            </div>
                            
                          </div> 
                        </div>
                      </div>

                     

                      {{-- <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                          <a class="btn btn-danger" href="{{ route('user.driver.index') }}">
                            @lang('button.cancel')
                          </a>
                          <button class="btn btn-primary" type="submit">Save
                          </button>
                        </div>
                      </div> --}}
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
