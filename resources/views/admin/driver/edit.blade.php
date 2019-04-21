@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Edit Driver
    @parent
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
        <h1>@lang('news/title.edit')</h1>
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
                  <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true">
                  </i>
                  Add New Bus
                </h3>
                <span class="pull-right clickable">
                  <i class="glyphicon glyphicon-chevron-up">
                  </i>
                </span>
              </div>
              <div class="panel-body">
                <!--main content-->
                {!! Form::model($driver, ['url' => URL::to('admin/driver/' . $driver->id), 'method' => 'put', 'class' => 'form-horizontal', 'files'=> true]) !!}
                {{-- <form id="commentForm" action="{{ route('admin.bus.store') }}"
                      method="POST" class="form-horizontal"> --}}

                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div id="rootwizard">
                                <h2 class="hidden">&nbsp;</h2>
                                <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                  <label for="first_name" class="col-sm-2 control-label">First Name *
                                  </label>
                                  <div class="col-sm-10">
                                    {!! Form::text('first_name', null, array('class' => 'form-control required', 'placeholder'=>'first name')) !!}
                                    {!! $errors->first('first_name', '
                                    <span class="help-block">:message
                                    </span>') !!}
                                  </div>
                                </div>

                                <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                                  <label for="last_name" class="col-sm-2 control-label">Second Name *
                                  </label>
                                  <div class="col-sm-10">
                                        {!! Form::text('last_name', null, array('class' => 'form-control required', 'placeholder'=>'Second Name')) !!}
                                    {!! $errors->first('last_name', '
                                    <span class="help-block">:message
                                    </span>') !!}
                                  </div>
                                </div>

                                <div class="form-group {{ $errors->first('third_name', 'has-error') }}">
                                  <label for="third_name" class="col-sm-2 control-label">Third Name *
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

                                <div class="form-group {{ $errors->first('ph_number', 'has-error') }}">
                                  <label for="ph_number" class="col-sm-2 control-label">Phone Number *
                                  </label>
                                  <div class="col-sm-10">
                                        {!! Form::text('ph_number', null, array('class' => 'form-control required', 'placeholder'=>'phone number')) !!}
                                    {!! $errors->first('ph_number', '
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
@stop

