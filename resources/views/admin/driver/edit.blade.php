@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Edit Driver
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">

    <!--end of page level css-->
@stop

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
            <li class="active">Edit Driver</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Edit Driver
                </h3>
                <span class="pull-right clickable">
                  <i class="glyphicon glyphicon-chevron-up">
                  </i>
                </span>
              </div>
              <div class="panel-body">
                <!--main content-->
                {!! Form::model($driver, ['url' => URL::to('admin/driver/' . $driver->id), 'method' => 'put', 'enctype' => 'multipart/form-data',
                       'class' => 'form-horizontal', 'files'=> true]) !!}
                    <!-- CSRF Token -->
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  
                  <div id="rootwizard">
                    <h2 class="hidden">&nbsp;</h2>
                    
                    <div class="row"> 
                      <div class="col-sm-8 animate_rt"> 
                        <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                          <label style="margin-top: -1%" for="first_name" class="col-sm-2 control-label">First Name*
                          </label>
                          <div class="col-sm-10">
                            {!! Form::text('first_name', null, array('class' => 'form-control required', 'placeholder'=>'first name')) !!}
                            {!! $errors->first('first_name', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                          <label style="margin-top: -1%" for="last_name" class="col-sm-2 control-label">Second Name *
                          </label>
                          <div class="col-sm-10">
                                {!! Form::text('last_name', null, array('class' => 'form-control required', 'placeholder'=>'Second Name')) !!}
                            {!! $errors->first('last_name', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('third_name', 'has-error') }}">
                          <label style="margin-top: -1%" for="third_name" class="col-sm-2 control-label">Third Name *
                          </label>
                          <div class="col-sm-10">
                                {!! Form::text('third_name', null, array('class' => 'form-control required', 'placeholder'=>'Third Name')) !!}
                            {!! $errors->first('third_name', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                          <label for="email" class="col-sm-2 control-label">Email *
                          </label>
                          <div class="col-sm-10">
                                {!! Form::text('email', null, array('class' => 'form-control required', 'placeholder'=>'email')) !!}
                            {!! $errors->first('email', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('license_number', 'has-error') }}">
                          <label for="license_number" class="col-sm-2 control-label">License Number *
                          </label>
                          <div class="col-sm-10">
                                {!! Form::text('license_number', null, array('class' => 'form-control required', 'placeholder'=>'license number')) !!}
                            {!! $errors->first('license_number', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>
                        
                        <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                          <label for="gender" class="col-sm-2 control-label">Gender *
                          </label>
                          <div class="col-sm-10">
                                {!! Form::text('gender', null, array('class' => 'form-control required', 'placeholder'=>'gender')) !!}
                            {!! $errors->first('gender', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('station_id', 'has-error') }}">
                          <label for="station_id" class="col-sm-2 control-label">Station *
                          </label>
                          <div class="col-sm-10">
                                {!! Form::select('station_id', $opStations, null, ['placeholder' => 'Select Station', 'class' => 'form-control required']) !!}
                            {!! $errors->first('station_id', '
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

                        <div class="form-group {{ $errors->first('ph_number', 'has-error') }}">
                          <label style="margin-top: -3%" for="ph_number" class="col-sm-2 control-label">Phone No.*
                          </label>
                          <div class="col-sm-10">
                                {!! Form::text('ph_number', null, array('class' => 'form-control required', 'placeholder'=>'phone number')) !!}
                            {!! $errors->first('ph_number', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('address', 'has-error') }}">
                          <label style="margin-left: -3" for="address" class="col-sm-2 control-label">ADRSS
                          </label>
                          <div style="margin-left: 0%" class="col-sm-10">
                                {!! Form::text('address', null, array('class' => 'form-control required', 'placeholder'=>'address')) !!}
                            {!! $errors->first('address', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                          <label for="dob" class="col-sm-2 control-label">DOB
                          </label>
                          <div class="col-sm-10">
                                {!! Form::text('dob', null, array('id' => 'dob','class' => 'form-control required', 'data-date-format' => 'YYYY-MM-DD')) !!}
                            {!! $errors->first('dob', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('pic', 'has-error') }}">
                            <label class="control-label col-xs-12"></label>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 200px;">
                                    @if(!empty($driver->pic))

                                        {{-- <img src="{{URL::to('storage/driver/'.$driver->pic)}}" class="img-responsive"
                                              alt="Image"> --}}
                                        
                                        <img src="{{ asset('storage/driver/'.$driver->pic) }}" alt="picture"
                                              class="img-responsive"/>
                                    @else
                                        <img src="{{ asset('assets/images/authors/no_avatar.jpg') }}" alt="..."
                                              class="img-responsive"/>
                                    @endif

                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"
                                      style="max-width: 200px; max-height: 150px;"></div>
                                <div> 
                                  {!! Form::file('pic', array('name'=> 'pic', 'class' => 'btn btn-primary', 'id' => 'pic')) !!}
                                  <span  style="margin-top: 3%"  class="btn btn-primary fileinput-exists"
                                        data-dismiss="fileinput">
                                      Remove
                                  </span>
                                </div>
                            </div>
                            <span class="help-block">{{ $errors->first('content', ':message') }}</span>
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
    <script src="{{ asset('assets/vendors/summernote/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/add_newblog.js') }}"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
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

