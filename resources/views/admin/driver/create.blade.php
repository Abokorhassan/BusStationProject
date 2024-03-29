@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Add Driver
@stop

{{-- page level styles --}}
@section('header_styles')
  {{-- <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet"/>
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
  <link href="{{ asset('assets/css/parsley.css') }}" rel="stylesheet"> --}}

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
                      <div  class="form-group {{ $errors->first('driver_number', 'has-error') }}">
                        <label  style="margin-top: 0%"  for="driver_number" class="col-sm-2 control-label">Driver No.*
                        </label>
                        <div class="col-sm-10">
                          <input id="driver_number" name="driver_number" type="text" autocomplete="off" placeholder="Ex. Dr_01"
                                  class="form-control required" value="{!! old('driver_number') !!}"/>
                          {!! $errors->first('driver_number', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div class="form-group {{ $errors->first('firstname', 'has-error') }}">
                        <label style="margin-top: 0%" for="first_name" class="col-sm-2 control-label">F.Name *
                        </label>
                        <div class="col-sm-10">
                          <input id="firstname" name="firstname" type="text" autocomplete="off"
                                  placeholder="first name" class="form-control required"
                                  value="{!! old('firstname') !!}"/>
                          {!! $errors->first('firstname', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div  class="form-group {{ $errors->first('second_name', 'has-error') }}">
                        <label style="margin-top: 0%"   for="second_name" class="col-sm-2 control-label">S.Name *
                        </label>
                        <div class="col-sm-10">
                          <input id="second_name" name="second_name" type="text" autocomplete="off" placeholder="second name"
                                  class="form-control required" value="{!! old('second_name') !!}"/>
                          {!! $errors->first('second_name', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div  class="form-group {{ $errors->first('third_name', 'has-error') }}">
                        <label  style="margin-top: 0%"  for="third_name" class="col-sm-2 control-label">Th.Name *
                        </label>
                        <div class="col-sm-10">
                          <input id="third_name" name="third_name" type="text" autocomplete="off" placeholder="third name"
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
                          <input id="email" name="email" placeholder="email" type="text" autocomplete="off"
                                  class="form-control required email" value="{!! old('email') !!}"/>
                          {!! $errors->first('email', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div class="form-group {{ $errors->first('license_number', 'has-error') }}">
                        <label style="margin-top: -1.8%" for="license_number" class="col-sm-2 control-label">License <p> No. *</p> 
                        </label>
                        <div class="col-sm-10">
                          <input id="license_number" name="license_number" autocomplete="off" placeholder="license number" type="text"
                                  class="form-control required email" value="{!! old('license_number') !!}"/>
                          {!! $errors->first('license_number', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      {{-- <div class="form-group {{ $errors->first('genders', 'has-error') }}">
                        <label for="genders" class="col-sm-2 control-label">Gender *
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
                      </div> --}}

                      <div class="form-group {{ $errors->first('station', 'has-error') }}">
                        <label style="margin-top: -0.6%" for="station" class="col-sm-2 control-label">Station*
                        </label>
                        <div class="col-sm-10">
                          <select class="form-control" id="station" title="Select station..." name="station">                                         
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
                      
                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                            <a href="{{ route('admin.driver.index') }}">
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
                        <label style="margin-top: -3%" for="ph_number" class="col-sm-2 control-label">Phone No.*
                        </label>
                        <div class="col-sm-10">
                          <input id="ph_number" name="ph_number" autocomplete="off" placeholder="phone number" type="text"
                                  class="form-control required email" value="{!! old('ph_number') !!}"/>
                          {!! $errors->first('ph_number', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div class="form-group">
                        <label style="margin-left: -2%" for="address" class="col-sm-2 control-label">Address
                        </label>
                        <div style="margin-left: 2%" class="col-sm-10">
                          <input id="address" name="address" type="text" autocomplete="off" placeholder="address" class="form-control"
                                  value="{!! old('address') !!}"/>
                        </div>
                        <span class="help-block">{{ $errors->first('address', ':message') }}
                        </span>
                      </div>

                      <div class="form-group  {{ $errors->first('dob', 'has-error') }}">
                          <label style="margin-left: -2%" for="dob" class="col-sm-2 control-label">DOB
                          </label>
                          <div style="margin-left: 2%" class="col-sm-10">
                            <input id="dob" name="dob" type="text"  autocomplete="off" class="form-control"
                                    data-date-format="YYYY-MM-DD"
                                    placeholder="yyyy-mm-dd"/>
                          </div>
                          <span class="help-block">{{ $errors->first('dob', ':message') }}
                          </span>
                      </div>

                      <div class="form-group {{ $errors->first('pic_file', 'has-error') }}">
                        <label  for="pic" class="col-sm-2 control-label">Driver picture
                        </label>
                        <div class="col-sm-10">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                              <img src="{{ asset('assets/images/authors/no_avatar.jpg') }}" alt="profile pic">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;">
                            </div>
                            <div>
                              <span class="btn btn-default btn-file">
                                <span class="fileinput-new">Select image
                                </span>
                                <span class="fileinput-exists">Change
                                </span>
                                <input id="pic" name="pic_file" type="file" class="form-control"/>
                              </span>
                              {{-- <a href="#" class="btn btn-danger fileinput-exists"
                                  data-dismiss="fileinput">
                              </a> --}}
                              <span style="width: 2rem">
                                <a href="#" class="btn btn-danger btn-sm fileinput-exists" data-dismiss="fileinput" >
                                  <button type="button" class="btn btn-danger">
                                      Remove
                                  </button>
                                </a>
                              </span>
                            </div>
                          </div>
                          <span class="help-block">{{ $errors->first('pic_file', ':message') }}
                          </span>
                        </div>
                      </div>

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
  {{-- <script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
  <script src="{{ asset('assets/js/pages/add_newblog.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/parsley.min.js') }}" type="text/javascript"></script>

  <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
  <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
  <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/pages/adduser.js') }}"></script> --}}

  <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
  <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
  <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/pages/adduser.js') }}"></script>
  <script type="text/javascript">

    function formatState (state) {
      if (!state.id) { return state.text; }
      var $state = $(
          '<span><img src="{{ asset('assets/img/countries_flags') }}/'+ state.element.value.toLowerCase() + '.png" class="img-flag" width="20px" height="20px" /> ' + state.text + '</span>'
      );
      return $state;
    }
    $("#station").select2({
      placeholder:'select Station', allowClear:true
    });
  </script>
@stop
