@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Edit Bus
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
                <a href="#">Bus</a>
            </li>
            <li class="active">Add New Bus</li>
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
                {!! Form::model($bus, ['url' => URL::to('admin/bus/' . $bus->id), 'method' => 'put', 'class' => 'form-horizontal', 'files'=> true]) !!}
                {{-- <form id="commentForm" action="{{ route('admin.bus.store') }}"
                      method="POST" class="form-horizontal"> --}}

                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div id="rootwizard">
                                <h2 class="hidden">&nbsp;</h2>
                                <div class="form-group {{ $errors->first('model_type', 'has-error') }}">
                                  <label for="name" class="col-sm-2 control-label">Model Type *
                                  </label>
                                  <div class="col-sm-10">
                                    {!! Form::text('model_type', null, array('class' => 'form-control required', 'placeholder'=>'Model Type')) !!}
                                    
                                    {{-- <input id="model_type" name="model_type" type="text"
                                           placeholder="Model Type" class="form-control required"
                                           value="{!! old('model_type') !!}"/> --}}
                                    {!! $errors->first('model_type', '
                                    <span class="help-block">:message
                                    </span>') !!}
                                  </div>
                                </div>

                                <div class="form-group {{ $errors->first('bus_number', 'has-error') }}">
                                  <label for="bus_number" class="col-sm-2 control-label">Bus Number *
                                  </label>
                                  <div class="col-sm-10">
                                        {!! Form::text('bus_number', null, array('class' => 'form-control required', 'placeholder'=>'Bus Number')) !!}
                                    {{-- <input id="bus_number" name="bus_number" type="text" placeholder="Bus Number"
                                           class="form-control required" value="{!! old('bus_number') !!}"/> --}}
                                    {!! $errors->first('bus_number', '
                                    <span class="help-block">:message
                                    </span>') !!}
                                  </div>
                                </div>

                                <div class="form-group {{ $errors->first('Driver_id', 'has-error') }}">
                                  <label for="Driver_id" class="col-sm-2 control-label">Driver_id *
                                  </label>
                                  <div class="col-sm-10">
                                        {!! Form::text('Driver_id', null, array('class' => 'form-control required', 'placeholder'=>'Driver_id')) !!}
                                    {{-- <input id="Driver_id" name="Driver_id" placeholder="Driver_id" type="text"
                                           class="form-control required email" value="{!! old('Driver_id') !!}"/> --}}
                                    {!! $errors->first('Driver_id', '
                                    <span class="help-block">:message
                                    </span>') !!}
                                  </div>
                                </div>

                                <div class="form-group {{ $errors->first('station_id', 'has-error') }}">
                                  <label for="station_id" class="col-sm-2 control-label">Station_id *
                                  </label>
                                  <div class="col-sm-10">
                                        {!! Form::text('station_id', null, array('class' => 'form-control required', 'placeholder'=>'Station_id')) !!}
                                    {{-- <input id="station_id" name="station_id" placeholder="Station_id" type="text"
                                           class="form-control required email" value="{!! old('station_id') !!}"/> --}}
                                    {!! $errors->first('station_id', '
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
    <script src="{{ asset('assets/vendors/summernote/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/add_newblog.js') }}"></script>
@stop

