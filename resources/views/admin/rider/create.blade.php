@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Add Rider
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
        <h1>Add New Rider</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Rider</a>
            </li>
            <li class="active">Add New Rider</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                      <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true">
                      </i>
                      Add New Rider
                    </h3>
                    <span class="pull-right clickable">
                      <i class="glyphicon glyphicon-chevron-up">
                      </i>
                    </span>
                  </div>
                  <div class="panel-body">
                    <!--main content-->
                    <form id="commentForm" action="{{ route('admin.rider.store') }}"
                        method="POST" class="form-horizontal">
                      <!-- CSRF Token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      <div id="rootwizard">
                        <h2 class="hidden">&nbsp;</h2>

                        <div class="form-group {{ $errors->first('id_number', 'has-error') }}">
                            <label for="id_number" class="col-sm-2 control-label">Id Number *
                            </label>
                            <div class="col-sm-10">
                              <input id="id_number" name="id_number" placeholder="Id Number" type="text"
                                      class="form-control required" value="{!! old('id_number') !!}"/>
                              {!! $errors->first('id_number', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                          <label for="first_name" class="col-sm-2 control-label">First Name *
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
                          <label for="second_name" class="col-sm-2 control-label">Second Name *
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
                          <label for="third_name" class="col-sm-2 control-label">Third Name *
                          </label>
                          <div class="col-sm-10">
                            <input id="third_name" name="third_name" placeholder="third name" type="text"
                                    class="form-control required " value="{!! old('third_name') !!}"/>
                            {!! $errors->first('third_name', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                          <label for="gender" class="col-sm-2 control-label">Gender *
                          </label>
                          <div class="col-sm-10">
                            <select class="form-control" title="Select Gender..." name="gender">
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
                          <label for="ph_number" class="col-sm-2 control-label">Phone Number *
                          </label>
                          <div class="col-sm-10">
                            <input id="ph_number" name="ph_number" placeholder="phone number" type="text"
                                    class="form-control required" value="{!! old('ph_number') !!}"/>
                            {!! $errors->first('ph_number', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('user_id', 'has-error') }}">
                            <label for="user_id" class="col-sm-2 control-label">User Id *
                            </label>
                            <div class="col-sm-10">
                              <input id="user_id" name="user_id" placeholder="User Id" type="text"
                                     class="form-control required " value="{!! old('user_id') !!}"/>
                              {!! $errors->first('user_id', '
                              <span class="help-block">:message
                              </span>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                                    <a class="btn btn-danger" href="{{ route('admin.bus.index') }}">
                                        @lang('button.cancel')
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
  <script src="{{ asset('assets/js/parsley.min.js') }}" type="text/javascript"></script>

@stop
