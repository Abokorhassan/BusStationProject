@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Add Driver
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
    <link href="{{ asset('assets/css/parsley.css') }}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Driver</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Driver</a>
            </li>
            <li class="active">Add New Driver</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                      Add New Driver
                    </h3>
                    <span class="pull-right clickable">
                      <i class="glyphicon glyphicon-chevron-up">
                      </i>
                    </span>
                  </div>
                  <div class="panel-body">
                    <!--main content-->
                    <form id="commentForm" action="{{ route('admin.driver.store') }}"
                        method="POST" enctype="multipart/form-data" class="form-horizontal">
                      <!-- CSRF Token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      <div id="rootwizard">
                        <h2 class="hidden">&nbsp;</h2>

                        <div class="row">

                          <div class="col-sm-8 animate_rt">
                            <div class="form-group {{ $errors->first('firstname', 'has-error') }}">
                              <label style="margin-top: -2%" for="first_name" class="col-sm-2 control-label">First Name*
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
                            {{-- <div class="row">

                              <div  class="col-sm-6 form-group {{ $errors->first('second_name', 'has-error') }}">
                                <label  for="second_name" class="col-sm-4 control-label">Familly Names *
                                </label>
                                <div class="col-sm-8">
                                  <input id="second_name" name="second_name" type="text" placeholder="Second Name"
                                          class="form-control required" value="{!! old('second_name') !!}"/>
                                  {!! $errors->first('second_name', '
                                  <span class="help-block">:message
                                  </span>') !!}
                                </div>
                              </div>
      
                              <div  class="col-sm-6 form-group {{ $errors->first('third_name', 'has-error') }}">
                                <label  for="third_name" class="col-sm-4 control-label">Third Name *
                                </label>
                                <div class="col-sm-8">
                                  <input id="third_name" name="third_name" type="text" placeholder="Third Name"
                                          class="form-control required" value="{!! old('third_name') !!}"/>
                                  {!! $errors->first('third_name', '
                                  <span class="help-block">:message
                                  </span>') !!}
                                </div>
                              </div>

                            </div> --}}
                            <div  class="form-group {{ $errors->first('second_name', 'has-error') }}">
                              <label style="margin-top: -2%"   for="second_name" class="col-sm-2 control-label">Second Name *
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
                              <label  style="margin-top: -2%"  for="third_name" class="col-sm-2 control-label">Third Name *
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
                              <label for="email" class="col-sm-2 control-label">Email *
                              </label>
                              <div class="col-sm-10">
                                <input id="email" name="email" placeholder="Email" type="text"
                                        class="form-control required email" value="{!! old('email') !!}"/>
                                {!! $errors->first('email', '
                                <span class="help-block">:message
                                </span>') !!}
                              </div>
                            </div>

                            <div class="form-group {{ $errors->first('ph_number', 'has-error') }}">
                              <label for="ph_number" class="col-sm-2 control-label">Phone Number *
                              </label>
                              <div class="col-sm-10">
                                <input id="ph_number" name="ph_number" placeholder="phone number" type="text"
                                        class="form-control required email" value="{!! old('ph_number') !!}"/>
                                {!! $errors->first('ph_number', '
                                <span class="help-block">:message
                                </span>') !!}
                              </div>
                            </div>

                            <div class="form-group {{ $errors->first('license_number', 'has-error') }}">
                              <label for="license_number" class="col-sm-2 control-label">License Number *
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
                              <label style="margin-left: -3%" for="genders" class="col-sm-2 control-label">Gender*
                              </label>
                              <div style="margin-left: 2%;" class="col-sm-10">
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
                                    <a class="btn btn-danger" href="{{ route('admin.driver.index') }}">
                                        @lang('button.cancel')
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        @lang('button.save')
                                    </button>
                                </div>
                              </div>
                            </div>

                          <div class="col-sm-4 animate_rt">
                            {{-- <div class="form-group {{ $errors->first('genders', 'has-error') }}">
                              <label style="margin-left: -3%" for="genders" class="col-sm-2 control-label">Gender*
                              </label>
                              <div style="margin-left: 2%;" class="col-sm-10">
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
                            </div> --}}
                            <div class="form-group">
                                <label style="margin-left: -3%" for="address" class="col-sm-2 control-label">Address
                                </label>
                                <div style="margin-left: 2%" class="col-sm-10">
                                  <input id="address" name="address" type="text" class="form-control"
                                          value="{!! old('address') !!}"/>
                                </div>
                                <span class="help-block">{{ $errors->first('address', ':message') }}
                                </span>
                            </div>
                            <div class="form-group  {{ $errors->first('dob', 'has-error') }}">
                                <label style="margin-left: -3%" for="dob" class="col-sm-2 control-label">DOB
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
                          <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                              <a class="btn btn-danger" href="{{ route('admin.driver.index') }}">
                                  @lang('button.cancel')
                              </a>
                              <button type="submit" class="btn btn-success">
                                  @lang('button.save')
                              </button>
                          </div>
                        </div> --}}
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
