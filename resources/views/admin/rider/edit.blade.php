@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Edit Rider
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
                {!! Form::model($rider, ['url' => URL::to('admin/rider/' . $rider->id), 'method' => 'put', 'class' => 'form-horizontal', 'files'=> true]) !!}
                {{-- <form id="commentForm" action="{{ route('admin.bus.store') }}"
                      method="POST" class="form-horizontal"> --}}

                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div id="rootwizard">
                                <h2 class="hidden">&nbsp;</h2>

                                <div class="form-group {{ $errors->first('id_number', 'has-error') }}">
                                    <label for="id_number" class="col-sm-2 control-label">Id Number *
                                    </label>
                                    <div class="col-sm-10">
                                          {!! Form::text('id_number', null, array('class' => 'form-control required', 'placeholder'=>'Id number')) !!}
                                      {!! $errors->first('id_number', '
                                      <span class="help-block">:message
                                      </span>') !!}
                                    </div>
                                  </div>
  
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

                                <div class="form-group {{ $errors->first('second_name', 'has-error') }}">
                                  <label for="second_name" class="col-sm-2 control-label">Second Name *
                                  </label>
                                  <div class="col-sm-10">
                                        {!! Form::text('second_name', $rider->last_name, array('class' => 'form-control required', 'placeholder'=>'Second Name')) !!}
                                    {!! $errors->first('second_name', '
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

                                <div class="form-group {{ $errors->first('user_id', 'has-error') }}">
                                  <label for="user_id" class="col-sm-2 control-label">User Id *
                                  </label>
                                  <div class="col-sm-10">
                                        {!! Form::text('user_id', null, array('class' => 'form-control required', 'placeholder'=>'User Id')) !!}
                                    {!! $errors->first('user_id', '
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

